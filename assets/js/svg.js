class Svg {
  constructor() {
    this.ILLUSTRATION_COUNT = 48;
    this.ILLUSTRATION_NAMES = Array.from(
      { length: this.ILLUSTRATION_COUNT },
      (_, i) => `illu${i + 1}`,
    );
    this.SECTION_HEIGHT = 700;
    this.SVG_SIZE = "30vw";
    this.SVG_CONTENT = [];
    this.svgCache = new Map();
    this.observer = null;
    this.currentColorClass = null;
    this.loadingSvgs = new Map();
    this.currentElement = null;
    this.initializeObserver();

    // Add resize handler
    window.addEventListener('resize', this.handleResize.bind(this));

    // Add color class mutation observer
    this.initializeColorObserver();
  }

  initializeColorObserver() {
    // Create mutation observer to watch for color class changes
    this.colorObserver = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
          const header = document.querySelector('.header');
          if (header) {
            const colorClasses = ['bgpink', 'bggreen', 'bgyellow', 'bgwhite'];
            const currentColor = colorClasses.find(cls => header.classList.contains(cls));
            if (currentColor && this.currentColorClass !== currentColor) {
              this.currentColorClass = currentColor;
              this.updateAllSvgColors(currentColor);
            }
          }
        }
      });
    });

    // Start observing header element
    const header = document.querySelector('.header');
    if (header) {
      this.colorObserver.observe(header, {
        attributes: true,
        attributeFilter: ['class']
      });
    }
  }

  updateAllSvgColors(colorClass) {
    const allIllus = document.querySelectorAll('.illus');
    const colorClasses = ['bgpink', 'bggreen', 'bgyellow', 'bgwhite'];

    allIllus.forEach(illu => {
      // Remove all color classes
      colorClasses.forEach(cls => illu.classList.remove(cls));
      // Add new color class
      illu.classList.add(colorClass);
    });
  }

  handleResize() {
    clearTimeout(this.resizeTimeout);
    this.resizeTimeout = setTimeout(() => {
      if (this.currentElement) {
        this.showSvg(this.currentElement);
      }
    }, 200);
  }

  initializeObserver() {
    this.observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const placeholder = entry.target;
            const svgName = placeholder.dataset.svgName;
            const svgIndex = placeholder.dataset.svgIndex;
            if (svgName && svgIndex) {
              // Only unobserve after successful load
              this.loadAndReplacePlaceholder(placeholder, svgName, parseInt(svgIndex))
                .then(success => {
                  if (success) {
                    this.observer.unobserve(placeholder);
                  }
                });
            }
          }
        });
      },
      {
        rootMargin: '50px 0px',
        threshold: 0.1
      }
    );
  }

  async loadAndReplacePlaceholder(placeholder, svgName, index) {
    try {
      const svg = await this.loadSvg(svgName);
      if (!svg) return false;

      const parser = new DOMParser();
      const svgDoc = parser.parseFromString(svg, "image/svg+xml");
      const svgElem = svgDoc.documentElement;

      if (!(svgElem instanceof SVGElement)) {
        throw new Error("Parsed element is not an SVG element");
      }

      // Get classes from placeholder and add current color class
      const classes = Array.from(placeholder.classList)
        .filter(cls => cls !== 'illus-placeholder');

      if (this.currentColorClass) {
        classes.push(this.currentColorClass);
      }

      // Apply classes to SVG using setAttribute
      svgElem.setAttribute('class', classes.join(' '));

      // Position and style the SVG
      const top = index < 2
        ? `calc(25vh * ${index + 1})`
        : `${this.SECTION_HEIGHT / 2 + this.SECTION_HEIGHT * (index - 1)}px`;

      const rotationDirection = index % 2 === 0 ? -1 : 1;
      const rotation = this._getRandomArbitrary(10, 15) * rotationDirection;

      svgElem.style.cssText = `
        position: absolute;
        z-index: 2;
        top: ${top};
        ${index % 2 ? "left: -15vw;" : "right: -15vw;"}
        transform: rotate(${rotation}deg);
        height: ${this.SVG_SIZE};
        width: ${this.SVG_SIZE};
        transition: all 0.3s ease;
      `;

      const viewBox = this.extractViewBox(svgDoc);
      svgElem.setAttribute('viewBox', viewBox);
      svgElem.setAttribute('aria-hidden', 'true');
      svgElem.setAttribute('focusable', 'false');

      // Replace the placeholder
      if (placeholder.parentNode) {
        placeholder.parentNode.replaceChild(svgElem, placeholder);

        // Ensure color class is applied immediately after replacement
        if (this.currentColorClass) {
          svgElem.classList.add(this.currentColorClass);
        }

        return true;
      }
      return false;

    } catch (error) {
      console.error(`Error loading SVG "${svgName}":`, error);
      return false;
    }
  }

  async loadSvg(name) {
    if (this.svgCache.has(name)) {
      return this.svgCache.get(name);
    }
    if (this.loadingSvgs.has(name)) {
      return this.loadingSvgs.get(name);
    }

    try {
      const controller = new AbortController();
      const timeoutId = setTimeout(() => controller.abort(), 5000);

      const fetchPromise = fetch(`/assets/skp_illustrations/${name}.svg`, {
        signal: controller.signal
      })
        .then(response => {
          clearTimeout(timeoutId);
          if (!response.ok) throw new Error(`SVG not found: ${name}`);
          return response.text();
        })
        .then(svgText => {
          this.svgCache.set(name, svgText);
          this.loadingSvgs.delete(name);
          return svgText;
        })
        .catch(error => {
          console.error(`Error loading SVG "${name}":`, error);
          this.loadingSvgs.delete(name);
          return null;
        });

      this.loadingSvgs.set(name, fetchPromise);
      return fetchPromise;

    } catch (error) {
      console.error(`Error loading SVG "${name}":`, error);
      return null;
    }
  }

  async showSvg(elem) {
    this.currentElement = elem;
    if (!elem || !elem.offsetHeight) {
      console.warn("Invalid element passed to showSvg");
      return;
    }

    try {
      // Clear existing elements
      const existingSvgs = elem.querySelectorAll('.illus, .illus-placeholder');
      existingSvgs.forEach(svg => svg.remove());

      // Calculate number of SVGs needed
      const nbrFruits = Math.floor(elem.offsetHeight / this.SECTION_HEIGHT);

      // Get random selection of names
      const selectedNames = this._shuffleArray([...this.ILLUSTRATION_NAMES])
        .slice(0, nbrFruits);

      // Check current color class from header
      const header = document.querySelector('.header');
      if (header) {
        const colorClasses = ['bgpink', 'bggreen', 'bgyellow', 'bgwhite'];
        this.currentColorClass = colorClasses.find(cls => header.classList.contains(cls));
      }

      // Create placeholders with current color class
      selectedNames.forEach((name, i) => {
        const placeholder = document.createElement('div');
        placeholder.classList.add('illus-placeholder', 'illus');
        placeholder.classList.add(i % 2 ? 'left' : 'right');

        if (this.currentColorClass) {
          placeholder.classList.add(this.currentColorClass);
        }

        const top = i < 2
          ? `calc(25vh * ${i + 1})`
          : `${this.SECTION_HEIGHT / 2 + this.SECTION_HEIGHT * (i - 1)}px`;
        const rotation = this._getRandomArbitrary(10, 15) * (i % 2 ? 1 : -1);

        placeholder.style.cssText = `
          position: absolute;
          z-index: 2;
          top: ${top};
          ${i % 2 ? "left: -15vw;" : "right: -15vw;"}
          transform: rotate(${rotation}deg);
          height: ${this.SVG_SIZE};
          width: ${this.SVG_SIZE};
          background: rgba(0,0,0,0);
          transition: all 0.3s ease;
        `;

        placeholder.dataset.svgName = name;
        placeholder.dataset.svgIndex = i;

        elem.appendChild(placeholder);
        this.observer.observe(placeholder);
      });

    } catch (error) {
      console.error("Error in showSvg:", error);
    }
  }

  extractViewBox(svgDoc) {
    try {
      const svgElem = svgDoc.documentElement;
      const viewBox = svgElem.getAttribute('viewBox');
      return viewBox || '0 0 100 100';
    } catch (error) {
      console.error('Error extracting viewBox:', error);
      return '0 0 100 100';
    }
  }

  _shuffleArray(array) {
    const shuffled = [...array];
    for (let i = shuffled.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
    }
    return shuffled;
  }

  _getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
  }

  cleanup() {
    if (this.observer) {
      this.observer.disconnect();
      this.observer = null;
    }
    if (this.colorObserver) {
      this.colorObserver.disconnect();
      this.colorObserver = null;
    }
    window.removeEventListener('resize', this.handleResize.bind(this));
    this.svgCache.clear();
    this.loadingSvgs.clear();
    this.currentElement = null;
    this.currentColorClass = null;
  }
}

export default Svg;
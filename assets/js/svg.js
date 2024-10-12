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
  }

  async initialize() {
    try {
      for (const name of this.ILLUSTRATION_NAMES) {
        const svg = await this.loadSvg(name);
        if (svg) {
          this.SVG_CONTENT.push([svg, this.extractViewBox(svg)]);
        }
      }
    } catch (error) {
      console.error("Error during initialization:", error);
    }
  }

  async loadSvg(name) {
    if (this.svgCache.has(name)) {
      return this.svgCache.get(name);
    }
    try {
      const response = await fetch(`/assets/skp_illustrations/${name}.svg`);
      if (!response.ok) throw new Error(`SVG not found: ${name}`);
      const svgText = await response.text();
      this.svgCache.set(name, svgText);
      return svgText;
    } catch (error) {
      console.error(`Error loading SVG "${name}":`, error);
      return null;
    }
  }

  extractViewBox(svgText) {
    try {
      const match = svgText.match(/viewBox="([^"]+)"/);
      return match ? match[1] : "0 0 100 100"; // default viewBox if not found
    } catch (error) {
      console.error("Error extracting viewBox:", error);
      return "0 0 100 100"; // default viewBox
    }
  }

  _shuffleArray(array) {
    if (!Array.isArray(array)) {
      console.error("Invalid array provided to _shuffleArray");
      return [];
    }
    let currentIndex = array.length,
      randomIndex;
    // While there remain elements to shuffle...
    while (currentIndex != 0) {
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
      // And swap it with the current element.
      [array[currentIndex], array[randomIndex]] = [
        array[randomIndex],
        array[currentIndex],
      ];
    }
    return array;
  }

  _getFruits(svgArray, nbrFruits) {
    if (!Array.isArray(svgArray) || typeof nbrFruits !== "number") {
      console.error("Invalid parameters for _getFruits");
      return [];
    }
    const shuffled = this._shuffleArray([...svgArray]);
    return shuffled.slice(0, nbrFruits);
  }

  async showSvg(elem) {
    try {
      if (!elem || !elem.offsetHeight) {
        console.error("Invalid element passed to showSvg");
        return;
      }

      if (this.SVG_CONTENT.length === 0) {
        await this.initialize();
      }

      const nbrFruits = Math.floor(elem.offsetHeight / this.SECTION_HEIGHT);
      const fruits = this._getFruits(this.SVG_CONTENT, nbrFruits);
      const fragment = document.createDocumentFragment();

      fruits.forEach((fruit, i) => {
        try {
          // Parse the SVG text into an SVG DOM element
          const parser = new DOMParser();
          const svgDoc = parser.parseFromString(fruit[0], "image/svg+xml");
          const svgElem = svgDoc.documentElement;

          // Check if parsing produced a valid SVG element
          if (!(svgElem instanceof SVGElement)) {
            throw new Error("Parsed element is not an SVG element");
          }

          // Apply classes to the SVG element
          svgElem.classList.add("illus", i % 2 ? "left" : "right");

          const top =
            i < 2
              ? `calc(25vh * ${i + 1})`
              : `${this.SECTION_HEIGHT / 2 + this.SECTION_HEIGHT * (i - 1)}px`;
          const rotation = this._getRandomArbitrary(10, 15) * (i % 2 ? 1 : -1);

          // Apply styles directly to the SVG element
          svgElem.style.cssText = `
            position: absolute;
            z-index: 2;
            top: ${top};
            ${i % 2 ? "left: -15vw;" : "right: -15vw;"}
            transform: rotate(${rotation}deg);
            height: ${this.SVG_SIZE};
            width: ${this.SVG_SIZE};
          `;

          // Optionally, set attributes using GSAP if needed
          if (typeof gsap !== "undefined") {
            gsap.set(svgElem, {
              attr: {
                viewBox: fruit[1],
              },
            });
          } else {
            console.warn("GSAP is not available.");
            // Fallback: set the viewBox directly
            svgElem.setAttribute("viewBox", fruit[1]);
          }

          fragment.appendChild(svgElem);
        } catch (error) {
          console.error(`Error processing fruit at index ${i}:`, error);
        }
      });

      elem.appendChild(fragment);
    } catch (error) {
      console.error("Error in showSvg:", error);
    }
  }

  _getRandomArbitrary(min, max) {
    if (typeof min !== "number" || typeof max !== "number") {
      console.error("Invalid parameters for _getRandomArbitrary");
      return 0;
    }
    return Math.random() * (max - min) + min;
  }
}

export default Svg;

import barba from "@barba/core";
import { makeElemToggler, getDeviceType } from "./sitefunctions";
import Animation from "./animations.js";
import Svg from "./svg.js";
const svg = new Svg();

gsap.registerPlugin(ScrollTrigger);

let openBtn = document.getElementById("openbtn");
let navi = document.getElementById("navi");
let menububls = document.querySelectorAll(".pagebubls");
let support = getDeviceType();

let intFrameWidth = window.innerWidth;
console.log("page width " + intFrameWidth);

const BREAK_ANIMATION = 1200;

makeElemToggler(openBtn, navi, "visible");

menububls.forEach(function (i) {
  i.addEventListener("click", function () {
    openBtn.classList.remove("closeBtn");
    document.documentElement.style.overflowY = "scroll";
    openBtn.innerHTML = "menu";
  });
});

openBtn.addEventListener("click", function () {
  if (this.classList.contains("closeBtn")) {
    this.classList.remove("closeBtn");
    this.innerHTML = "menu";
    document.documentElement.style.overflowY = "scroll";
  } else {
    this.classList.add("closeBtn");
    this.innerHTML = " ";
    document.documentElement.style.overflowY = "hidden";
  }
});

function _spinWheel() {
  const positions = ["b-left", "b-right", "b-top"];
  const elements = positions.map((pos) =>
    document.querySelector(`.roulette .${pos}`),
  );

  // Remove the position classes from all elements
  elements.forEach((el) => {
    positions.forEach((pos) => el.classList.remove(pos));
  });

  // Rotate the positions array
  positions.push(positions.shift()); // Move the first position to the end

  // Assign the new classes to elements
  elements.forEach((el, index) => {
    el.classList.add(positions[index]);
  });

  // Update the content based on the new top element
  const topElement = document.querySelector(".roulette .b-top");
  updateContent(topElement);
}

// Update description content
async function updateContent(topElement) {
  let oldTitle = document.querySelector(".roulette-content .active h1");
  let oldContent = document.querySelector(".roulette-content .active p");
  let id = topElement.getAttribute("data-id");
  let newTitleElement = document.querySelector(`.${id} h1`);
  let newContentElement = document.querySelector(`.${id} p`);

  let newTitle = newTitleElement ? newTitleElement.innerHTML : "";
  let newContent = newContentElement ? newContentElement.innerHTML : "";

  let container = document.querySelector(".container");
  let article = container.querySelector("article");

  container.style.height = container.offsetHeight + "px";

  await Animation.fadeGoals(article);

  oldTitle.innerHTML = newTitle;
  oldContent.innerHTML = newContent;

  let newHeight = article.offsetHeight;

  container.style.height =
    newHeight +
    4 * parseFloat(getComputedStyle(document.documentElement).fontSize) +
    "px";

  await Animation.showGoalsContent(article);
}

function addGoalsEvents() {
  let roulette = document.querySelector(".roulette");
  let automaticSpinInterval;
  automaticSpinInterval = setInterval(function () {
    _spinWheel();
  }, 3000);

  // Click event for manual spinning
  roulette.addEventListener("click", function (event) {
    if (event.target.classList.contains("bubl")) {
      clearInterval(automaticSpinInterval);
      _spinWheel();
    }
  });
}

function _changeColors(headerColor, illusClass) {
  console.log(" should change headerColor", headerColor);
  const header = document.querySelector(".header");
  const allIllus = document.querySelectorAll(".illus");

  header.style.color = headerColor;

  for (var i = 0; i < allIllus.length; ++i) {
    allIllus[i].classList.add(illusClass);
  }
}

function setupHomePage() {
  const header = document.querySelector(".header");
  header.style.color = "#FFE019";
  const bgsType = document.querySelectorAll(".bgcolor");
  const allIllus = document.querySelectorAll(".illus");
  const donate = document.querySelector(".donate");
  const bgcolors = ["bgpink", "bggreen", "bgyellow"];
  let classes = "\\b(" + bgcolors.join("|") + ")\\b";
  const regex = new RegExp(classes, "i");

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      let entryclass = entry.target.classList.value;
      const matchedClass = entryclass.match(regex);
      if (entry.isIntersecting) {
        header.classList.add(matchedClass[0]);
        donate.classList.add(matchedClass[0]);
        allIllus.forEach((illu) => {
          illu.classList.add(matchedClass[0]);
        });
      } else {
        header.classList.remove(matchedClass[0]);
        donate.classList.remove(matchedClass[0]);
        allIllus.forEach((illu) => {
          illu.classList.remove(matchedClass[0]);
        });
      }
    });
  });

  Array.prototype.forEach.call(bgsType, (el) => {
    observer.observe(el);
  });
}

function setupOtherPages(namespace) {
  switch (namespace) {
    case "journal":
    case "publication":
      _changeColors("#E5194C", "bgwhite");
      break;
    case "about":
    case "involved":
      _changeColors("#07453A", "bgyellow");
      break;
    case "donate":
      _changeColors("#FFE019", "bgpink");
      break;
  }
}

barba.hooks.leave(() => {
  if (history.scrollRestoration) {
    history.scrollRestoration = "manual";
  }
});

barba.hooks.enter((data) => {
  if (history.scrollRestoration) {
    window.scrollTo(0, 0);
  }
});

barba.init({
  sync: true,
  debug: true,
  prevent: ({ el }) => el.classList && el.classList.contains("barba-prevent"),
  transitions: [
    {
      name: "opacity-transition",
      async leave(data) {
        await Animation.leave(data.current.container);
      },
      async enter(data) {
        try {
          await svg.initialize();
          await svg.showSvg(data.next.container);
          Animation.cardSlide(goalsCards);
          // Trigger cardSlide animation after page transition

          Animation.enter(data.next.container);
          if (data.next.namespace === "home") {
            // addGoalsEvents();
$
            if (support !== "mobile") {

              const goalsCards = document.querySelectorAll('.goal');  // Make sure to get elements after transition
              if (goalsCards.length > 0) {
                Animation.cardSlide(goalsCards);
              }

              // Animation.addTextAnimation();
              Animation.addBtnAnimation();
            }
            setupHomePage();
          } else {
            setupOtherPages(data.next.namespace);
          }
        } catch (error) {
          console.error("Error during enter transition:", error);
        }
      },
      async once(data) {
        try {
          await svg.initialize();
          await svg.showSvg(data.next.container);
          const goalsCards = document.querySelectorAll('.goal');  // Make sure to get elements on page load

          if (data.next.namespace === "home") {
            // addGoalsEvents();
            if (support !== "mobile") {
              if (goalsCards.length > 0) {
                Animation.cardSlide(goalsCards);
              }
              // Animation.addTextAnimation();
              Animation.addBtnAnimation();
            }
            setupHomePage();
          } else {
            setupOtherPages(data.next.namespace);
          }
        } catch (error) {
          console.error("Error during initial page load:", error);
        }
      },
    },
  ],
});

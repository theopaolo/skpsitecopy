import barba from "@barba/core";
import { makeElemToggler, getDeviceType } from "./sitefunctions";
import Animation from "./animations.js";
import Svg from "./svg.js";
const svg = new Svg();

gsap.registerPlugin(InertiaPlugin);
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

function _spinWheel(e) {
  let top = document.querySelector(".b-top");

  if (e.target === top) {
    updateContent(e);
    return;
  }

  let old = e.target.className.split(" ")[2];

  if (old === "b-left") {
    let right = document.querySelector(".b-right");
    top.classList.remove("b-top");
    top.classList.add("b-right");
    right.classList.remove("b-right");
    right.classList.add("b-left");
    e.target.classList.remove(old);
    e.target.classList.add("b-top");
  } else {
    let left = document.querySelector(".b-left");
    top.classList.remove("b-top");
    top.classList.add("b-left");
    left.classList.remove("b-left");
    left.classList.add("b-right");
    e.target.classList.remove(old);
    e.target.classList.add("b-top");
  }
  updateContent(e);
}

// Update description content
async function updateContent(e) {
  let oldTitle = document.querySelector(".roulette-content .active h1");
  let oldContent = document.querySelector(".roulette-content .active p");
  let id = e.target.getAttribute("data-id");
  let newTitle = document.querySelector("." + id + " h1").innerHTML;
  let newContent = document.querySelector("." + id + " p").innerHTML;

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

  roulette.addEventListener("click", function (event) {
    _spinWheel(event);
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

          Animation.enter(data.next.container);
          if (data.next.namespace === "home") {
            addGoalsEvents();
            if (support !== "mobile") {
              Animation.addTextAnimation();
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

          if (data.next.namespace === "home") {
            addGoalsEvents();
            if (support !== "mobile") {
              Animation.addTextAnimation();
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

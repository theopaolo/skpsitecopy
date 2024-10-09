class Animation {
  enterGoals(current, next) {
    let tl = gsap.timeline();
    const content = next.querySelector(".goals-content");

    return tl
      .to(current, { display: "none", duration: 0 })
      .from(content, { opacity: 0, duration: 0.5 }, "<");
  }

  fadeGoals(elem) {
    let tl = gsap.timeline();

    return tl.to(elem, { opacity: 0, duration: 0.5 });
  }

  addTextAnimation() {
    let tl = gsap.timeline();

    return tl
      .to("#textFirst", { backgroundPosition: "0 0", duration: 1 })
      .to("#textSecond", { backgroundPosition: "0 0", duration: 0 }, "<2.5");
  }

  addBtnAnimation() {
    const tl = gsap
      .timeline({
        scrollTrigger: {
          trigger: ".storyAnim",
          scrub: true,
          pin: true,
          start: "bottom bottom",
          end: "+=40%",
        },
      })
      .to(".butbtn", { bottom: 0, transform: "none", scale: 8, ease: "none" })
      .to(".nextpage", { ease: "none", top: "65%" }, 0, 0.5);

    const tl2 = gsap
      .timeline({
        scrollTrigger: {
          trigger: ".storypage",
          scrub: true,
          pin: true,
          start: "bottom bottom",
          end: "+=40%",
        },
      })
      .to(".butbtn2", { bottom: 0, transform: "none", scale: 8, ease: "none" })
      .to(".nextpage2", { ease: "none", top: "65%" }, 0, 0.5);
  }

  showGoalsContent(elem) {
    let tl = gsap.timeline();

    return tl
    .set(elem, { opacity: 0 }) // Set initial opacity to 0
    .to(elem, { opacity: 1, duration: 0.5 });
  }

  // get color from barba container => [data-transition]
  _getColor(elem) {
    const color = elem.dataset.transition;

    return color;
  }

  enter(elem) {
    let tl = gsap.timeline();
    const navi = document.querySelector(".visible");
    const color = this._getColor(elem);

    if (navi) {
      navi.classList.remove("visible");
    }

    return tl
      .to(".transition", { backgroundColor: color, duration: 0.5 })
      .to(".transition", { width: 0, height: 0, duration: 1 }, "<");
  }

  leave(elem) {
    let tl = gsap.timeline();
    const color = this._getColor(elem);

    return tl
      .to(".transition", { backgroundColor: color, duration: 0 })
      .to(".transition", { height: "200vw", width: "200vw", duration: 1 }, "<");
  }
}

export default new Animation();
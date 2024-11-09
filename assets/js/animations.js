class Animation {

  addTextAnimation() {
    let tl = gsap.timeline();

    return tl
      .to("#textFirst", { backgroundPosition: "0 0", duration: 1 })
      .to("#textSecond", { backgroundPosition: "0 0", duration: 0 }, "<2.5");
  }

  cardSlide(cards) {
    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".goals-wrapper",
        scrub: true,
        start: "start 100px",
        end: "+=60%",
      },
    });
    return tl
      .set(cards, { y: "100%" })
      .to(cards, {
        y: "-20%",
        duration: 3.5,
        stagger: 0.8,
      });
  }

  addBtnAnimation() {
    const tl = gsap
      .timeline({
        scrollTrigger: {
          trigger: ".storyAnim",
          scrub: 1,
          pin: true,
          start: "bottom bottom",
          end: "+=40%",
        },
      })
      .to(".bottom-circle", { bottom: 0, transform: "none", scale: 8, ease: "none" })
      .to(".next-section", { ease: "none", top: "65%" }, 0, 0.5);

    const tl2 = gsap
      .timeline({
        scrollTrigger: {
          trigger: ".story-end",
          scrub: 1,
          pin: false,
          start: "bottom bottom+=150",
          end: "+=70%",
        },
      })
      .to(".bottom-circle2", { bottom: 0, transform: "none", scale: 8, ease: "none" })
      .to(".next-section2", { ease: "none", top: "65%" }, 0, 0.5);
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
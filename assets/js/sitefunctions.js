export function makeElemToggler(togglerElem, targetElem, classString){
    togglerElem.addEventListener('click', toggleClass(targetElem, classString))
}

export function getDeviceType () {
    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        return "tablet";
    }
    if (
        /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(
        ua
        )
    ) {
        return "mobile";
    }
    return "desktop";
};

const toggleClass = (element, classtoToggle) => {
    return () => {
        element.classList.toggle(`${classtoToggle}`);
    };
};
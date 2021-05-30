// initialize the scroller
AOS.init();

const activate = (e) => {
  let active = e.getAttribute("aria-expanded") === "false" ? "true" : "false";
  e.setAttribute("aria-expanded", active);
  let menu = document.querySelectorAll("#main-menu")[0];
  menu.setAttribute("aria-expanded", active);
};

// initialize the scroller
AOS.init();

var activate = function activate(e) {
  var active = e.getAttribute("aria-expanded") === "false" ? "true" : "false";
  e.setAttribute("aria-expanded", active);
  var menu = document.querySelectorAll("#main-menu")[0];
  menu.setAttribute("aria-expanded", active);
};

var closePopUp = function closePopUp(e) {
  var popup = document.querySelectorAll(".floating-popup");
  popup[0].classList.add("exit-popup");
};
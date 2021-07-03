// initialize the scroller
AOS.init();

// (function ($) {
//   // Argument passed from InvokeCommand.
//   $.fn.setUserTypeCookie = function (argument) {
//     console.log(argument);

//     // Set cookie accordingly
//     document.cookie = "userType=" + argument;
//   };
// })(jQuery);

const activate = (e) => {
  let active = e.getAttribute("aria-expanded") === "false" ? "true" : "false";
  e.setAttribute("aria-expanded", active);
  let menu = document.querySelectorAll("#main-menu")[0];
  menu.setAttribute("aria-expanded", active);
};

const closePopUp = (e) => {
  let popup = document.querySelectorAll(".floating-popup");
  popup[0].classList.add("exit-popup");
};

function createCookie(name, value, days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    var expires = "; expires=" + date.toGMTString();
  } else var expires = "";
  document.cookie = name + "=" + value + ";";
}

const setAdvisorCookie = (e) => {
  document.cookie = "userType=advisor_type;";
  // createCookie("userType", "advisor_type", "22");

  // window.location.href = "user/register";
};

const setInvestorCookie = (e) => {
  document.cookie = "userType=investor_type";
  // createCookie("userType", "investor_type", "22");

  // window.location.href = "user/register";
};

const createCookieTooltip = (e) => {
  // check if tooltip is already expanded
  if (e.getAttribute("data-tooltip-expanded") !== "true") {
    e.setAttribute("data-tooltip-expanded", "true");
    let messageDiv = document.createElement("div");
    messageDiv.classList.add("tooltip", "text-align-center");
    messageDiv.setAttribute("aria-modal", "true");

    let acceptButton = document.createElement("button");
    acceptButton.classList.add("accept", "btn", "blue", "rounded-0");
    acceptButton.append("Accept");

    let messageP = document.createElement("p");
    messageP.append(
      "This website uses 'cookies' to give you the best, most relevant experience. By clicking 'Accept', you agree to the storing of cookies on your device."
    );

    messageDiv.innerHTML =
      "<button class='close-button' aria-label='Close' onclick='closeToolTip(this)'></button>";
    messageDiv.append(messageP, acceptButton);
    messageDiv.classList.add("entering");
    messageDiv.setAttribute("role", "dialog");

    e.parentNode.append(messageDiv);

    setTimeout(() => {
      messageDiv.classList.remove("entering");
    }, 1000);
  }
};

const closeToolTip = (e) => {
  e.parentNode.setAttribute("data-tooltip-expanded", "false");
  e.parentNode.classList.add("removing");
  setTimeout(() => {
    e.parentNode.remove();
  }, 1000);
};

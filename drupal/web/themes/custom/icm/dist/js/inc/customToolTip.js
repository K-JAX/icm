export var createCookieTooltip = function createCookieTooltip(e) {
  // check if tooltip is already expanded
  if (e.getAttribute("data-tooltip-expanded") !== "true") {
    e.setAttribute("data-tooltip-expanded", "true");
    var messageDiv = document.createElement("div");
    messageDiv.classList.add("tooltip", "text-align-center");
    messageDiv.setAttribute("aria-modal", "true");
    var acceptButton = document.createElement("button");
    acceptButton.classList.add("accept", "btn", "blue", "rounded-0");
    acceptButton.append("Accept");
    var messageP = document.createElement("p");
    messageP.append("This website uses 'cookies' to give you the best, most relevant experience. By clicking 'Accept', you agree to the storing of cookies on your device.");
    messageDiv.innerHTML = "<button class='close-button' aria-label='Close' onclick='closeToolTip(this)'></button>";
    messageDiv.append(messageP, acceptButton);
    messageDiv.classList.add("entering");
    messageDiv.setAttribute("role", "dialog");
    e.parentNode.append(messageDiv);
    setTimeout(function () {
      messageDiv.classList.remove("entering");
    }, 1000);
  }
};
export var closeToolTip = function closeToolTip(e) {
  e.parentNode.setAttribute("data-tooltip-expanded", "false");
  e.parentNode.classList.add("removing");
  setTimeout(function () {
    e.parentNode.remove();
  }, 1000);
};
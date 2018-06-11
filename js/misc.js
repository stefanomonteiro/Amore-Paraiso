// Detects if device is Touch-Screen
function isTouchDevice() {
  return "ontouchstart" in document.documentElement;
}

//Add Specific Classes for Touch Devices
if (isTouchDevice()) {
  //Section Services - HomePage
  document
    .querySelectorAll(".section-services__captions")
    .forEach(function(elem) {
      elem.classList.add("section-services__captions--touch");
    });

  document
    .querySelectorAll(".section-services__captions-paragraph")
    .forEach(function(elem) {
      elem.classList.add("section-services__captions-paragraph--touch");
    });

  document
    .querySelectorAll(".section-services__images-overlay")
    .forEach(function(elem) {
      elem.classList.add("section-services__images-overlay--touch");
    });
}

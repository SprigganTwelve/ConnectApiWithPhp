const menu = document.querySelector(".material-symbols-outlined");
const nav = document.querySelector("nav");
var open = true;

menu.addEventListener("click", () => {
  if (open) {
    nav.style.transform = "translate(0%)";
    menu.style.rotate = "180deg";
    setTimeout((menu.textContent = "X"), 120);
    open = false;
  } else {
    nav.style.transform = "translate(-100%)";
    menu.style.rotate = "-180deg";
    setTimeout((menu.textContent = "menu"), 120);
    open = true;
  }
});

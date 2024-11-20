document.addEventListener("DOMContentLoaded", () => {
  const navigation = document.getElementById("side-nav");
  const overlay = document.getElementById("overlay")
  const nav_button = document.getElementById("menu-btn");
  const nav_close_btn = document.querySelector("nav .close-btn");

  nav_button.addEventListener("click", toggleNav);

  nav_close_btn.addEventListener("click", toggleNav);

  function toggleNav() {
    navigation.classList.toggle("show");
    overlay.classList.toggle("show");
  }

  const menu = document.getElementById("popup-menu");
  const quiz_btn = document.getElementById("quiz-btn");
  const quiz_close_btn = document.querySelector("#popup-menu .close-btn");

  quiz_btn.addEventListener("click", () => {
    menu.classList.toggle("show");
  });

  quiz_close_btn.addEventListener("click", () => {
    menu.classList.toggle("show");
  });

  document.onclick = (e) => {
    if (!navigation.contains(e.target) && !nav_button.contains(e.target) && navigation.classList.contains("show")) {
      toggleNav()
    } 
  }

}) 



document.addEventListener("DOMContentLoaded", () => {
  const navigation = document.getElementById("side-nav");
  const overlay = document.getElementById("overlay")
  const nav_button = document.getElementById("menu-btn");

  // add a toggleNav funtion and use that as the callback function
  nav_button.addEventListener("click", () => {
    navigation.classList.toggle("show");
    overlay.classList.toggle("show");
  });

  document.querySelector("nav .close-btn").addEventListener("click", () => {
    navigation.classList.toggle("show");
    overlay.classList.toggle("show");
  });

  document.onclick = (e) => {
    if (!navigation.contains(e.target) && !nav_button.contains(e.target) && navigation.classList.contains("show")) {
        navigation.classList.toggle("show");
        overlay.classList.toggle("show");
    }
  } 

  const menu = document.getElementById("popup-menu");
  document.getElementById("quiz-btn").addEventListener("click", () => {
    menu.classList.toggle("show");
  });

  document.querySelector("#popup-menu .close-btn").addEventListener("click", () => {
    menu.classList.toggle("show");
  });

}) 



document.addEventListener("DOMContentLoaded", () => {
  const navigation = document.getElementById("side-nav");
  const nav_button = document.getElementById("menu-btn");
  const overlay = document.getElementById("overlay")
  const menu = document.getElementById("popup-menu");

  nav_button.addEventListener("click", () => {
    navigation.classList.toggle("show");
    overlay.classList.toggle("show");
  });

  document.querySelector("nav .close-btn").addEventListener("click", () => {
    navigation.classList.toggle("show");
    overlay.classList.toggle("show");
  });

  document.onclick = function(e){
    if (!navigation.contains(e.target) && !nav_button.contains(e.target) && navigation.classList.contains("show")) {
        navigation.classList.toggle("show");
        overlay.classList.toggle("show");
    }
  } 

  // add a toggleNav funtion and use that as the callback function

  document.getElementById("quiz-btn").addEventListener("click", () => {
    menu.style.height = "100%";
  });

  document.querySelector("#popup-menu .close-btn").addEventListener("click", () => {
    menu.style.height = "0%";
  });


}) 



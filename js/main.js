document.addEventListener("DOMContentLoaded", function() {
  const navigation = document.getElementById("side-nav");
  const menu = document.getElementById("popup-menu");

  document.getElementById("menu-btn").addEventListener("click", function() {
    navigation.classList.toggle("show");
  });

  document.querySelector("nav .close-btn").addEventListener("click", function() {
    navigation.classList.toggle("show");
  });

  document.getElementById("quiz-btn").addEventListener("click", function() {
    menu.style.height = "100%";
  });

  document.querySelector("#popup-menu .close-btn").addEventListener("click", function() {
    menu.style.height = "0%";
  });

}) 



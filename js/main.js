document.addEventListener("DOMContentLoaded", function() {
  const navigation = document.getElementById("side-nav");
  const nav_button = document.getElementById("menu-btn");
  const menu = document.getElementById("popup-menu");

  nav_button.addEventListener("click", function() {
    navigation.classList.toggle("show");
  });

  document.querySelector("nav .close-btn").addEventListener("click", function() {
    navigation.classList.toggle("show");
  });

  document.onclick = function(e){
    if (!navigation.contains(e.target) && !nav_button.contains(e.target) && navigation.classList.contains("show")) {
        navigation.classList.toggle("show");
    }
  } 

  document.getElementById("quiz-btn").addEventListener("click", function() {
    menu.style.height = "100%";
  });

  document.querySelector("#popup-menu .close-btn").addEventListener("click", function() {
    menu.style.height = "0%";
  });


}) 



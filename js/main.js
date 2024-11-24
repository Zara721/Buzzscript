
document.addEventListener("DOMContentLoaded", () => {
  randomizeUsername()

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

  document.onclick = (e) => {
    if (!navigation.contains(e.target) && !nav_button.contains(e.target) && navigation.classList.contains("show")) {
      toggleNav();
    } 
  }

  document.getElementById("die").addEventListener("click", randomizeUsername);

  function randomizeUsername(){
    const anon_usernames = ["Kitty", "Turtle", "Dolphin", "Shark", "Parrot", "Dinosaur", "Lizard", "Milk"];
    //existential turtle, stupid shark
    const username = document.getElementById("username")

    let randNum = Math.floor(Math.random() * anon_usernames.length);
    username.textContent = `Anonymous ${anon_usernames[randNum]}`
  }



  // Set up event listener for the qiestion's form submission 
  document.getElementById("play-btn").addEventListener("click", function(event) {
    // Get the selected quiz
    selectedQuiz = document.getElementById('quiz-select').value;
    window.location.href = `html/basic_question.html?selectedQuiz=${selectedQuiz}`;
  });

}) 

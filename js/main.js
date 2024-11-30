
document.addEventListener("DOMContentLoaded", () => {
  const anon_username = document.getElementById("anon-username");
  if (anon_username) {
    randomizeUsername()
    document.getElementById("die").addEventListener("click", randomizeUsername);
  }

  if (darkMode == "on") {
    toggleDarkMode() 
  }


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

  const dark_mode_btn = document.getElementById("dark-mode-btn");
  dark_mode_btn.addEventListener("click", toggleDarkMode)

  function toggleDarkMode() {
    document.querySelector("body").classList.toggle("dark-mode");
    document.querySelector(".username").classList.toggle("dark-mode");
    document.getElementById("menu-btn").classList.toggle("dark-mode");

  }

  function randomizeUsername(){
    const anon_usernames = ["Kitty", "Turtle", "Dolphin", "Shark", "Parrot", "Dinosaur", "Lizard", "Milk", "Axolotl", "Panther"];
    let randNum = Math.floor(Math.random() * anon_usernames.length);
    anon_username.textContent = `Anonymous${anon_usernames[randNum]}`
  }

  // Set up event listener for the qiestion's form submission 
  document.getElementById("play-btn").addEventListener("click", function(event) {
    // Get the selected quiz
    const quizSelect = document.getElementById('quiz-select');
    const selectedQuiz = quizSelect.value;

    const selectedOption = quizSelect.options[quizSelect.selectedIndex];
    let quiz_page = "basic_question";
    if (selectedOption.dataset.timed == "true") {
      quiz_page = "timed_questions";
    }


    if (document.querySelector("body").classList.contains("dark-mode")) {
      darkMode = "on";
    } 

    window.location.href = `php/${quiz_page}.php?selectedQuiz=${selectedQuiz}&darkMode=${darkMode}`;
  });

}) 

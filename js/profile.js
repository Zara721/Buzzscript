document.addEventListener("DOMContentLoaded", () => {

    if (darkMode == "on") {
        document.querySelector("body").classList.add("dark-mode");
    }

    let profile_config = userProfileConfig.split("#");
    generateProfilePicture()

    function generateProfilePicture() {
        const profileContainer = document.getElementById("profile-pic-container");
        
        const bodyImg = document.createElement("img");
        bodyImg.src = `../assets/Body/${profile_config[1]} Body.png`;
        bodyImg.id = "profile-body";

        const ringImg = document.createElement("img");
        ringImg.src = `../assets/Ring/${profile_config[2]} Ring.png`;
        ringImg.id = "profile-ring";

        const hatImg = document.createElement("img");
        hatImg.src = `../assets/Hats/${profile_config[0]} Hat.png`;
        hatImg.id = "profile-hat";

        profileContainer.appendChild(bodyImg);
        profileContainer.appendChild(ringImg);
        profileContainer.appendChild(hatImg);
    }

    const displayTitle = document.getElementById("title");
    document.getElementById("title-list").addEventListener("click", (e)=> {
        if (e.target.tagName === 'SPAN') {
            displayTitle.textContent = e.target.textContent;
        }  
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();

        const selected_title = document.getElementById("newTitle");
        selected_title.value = displayTitle.textContent;

        console.log(selected_title.value);
        this.submit()
    });

});
document.addEventListener("DOMContentLoaded", () => {
    const profileHats = ["Baseball", "Beret", "Bird Nest", "Cowboy", "Crown", "Jester", "Killer Mask", "Mafia", "Sherlock", "Summer", "Top", "Witch", "Zara"];
    const profileColors = ["Black", "Blue", "Brown", "Green", "Grey", "Light Blue", "Light Brown", "Light Green", "Orange", "Peach", "Pink", "Purple", "Red", "White", "Yellow"];

    const hatBtn = document.getElementById("hats");
    const bodyBtn = document.getElementById("body");
    const ringBtn = document.getElementById("ring");
;
    console.log(userProfileConfig);

    let profile_config = userProfileConfig.split("#");
    generateProfilePicture()

    populateOptions(profileHats, "Hats", "Hat Icon");
    populateOptions(profileColors, "Body", "Body");
    populateOptions(profileColors, "Ring", "Ring");

    let currentOptions = "";

    hatBtn.addEventListener("click", () => displayOptions("Hats"));
    bodyBtn.addEventListener("click", () => displayOptions("Body"));
    ringBtn.addEventListener("click", () => displayOptions("Ring"));

    document.getElementById("options").addEventListener("click", (e)=> {
        if (e.target.tagName === 'IMG') {
            const imgId = e.target.id;
            switch(currentOptions) {
                case "Hats":
                    profile_config[0] = imgId;
                    break
                case "Body":
                    profile_config[1] = imgId;
                    break
                case "Ring":
                    profile_config[2] = imgId;
                    break
                default:
                    console.log("INvalid Option")
            }
            updateProfilePicture()  
        }  
    });

    function populateOptions(array, parentFolder, subpath) {
        console.log(array)
        array.forEach(element => {
            const imgElement = document.createElement("img");
            imgElement.src = `../assets/${parentFolder}/${element} ${subpath}.png`
            imgElement.style.display = "none";
            imgElement.classList.add(parentFolder);
            imgElement.id = element;
            document.getElementById("options").appendChild(imgElement);
        });
    }

    function displayOptions(parentFolder) {
        if (currentOptions != "") {
            hideOptions()
        }
        const options = document.querySelectorAll(`img.${parentFolder}`);
        options.forEach(element => {
            element.style.display = "inline";
        });
        currentOptions = parentFolder
    }

    function hideOptions() {
        const options = document.querySelectorAll(`img.${currentOptions}`);
        options.forEach(element => {
            element.style.display = "none";
        });
    }

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

    function updateProfilePicture() {
        const bodyImg = document.getElementById("profile-body");
        bodyImg.src = `../assets/Body/${profile_config[1]} Body.png`;

        const ringImg = document.getElementById("profile-ring");
        ringImg.src = `../assets/Ring/${profile_config[2]} Ring.png`;

        const hatImg = document.getElementById("profile-hat");
        hatImg.src = `../assets/Hats/${profile_config[0]} Hat.png`;
    }

    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();

        const profile_config_element = document.getElementById("profile-config");
        profile_config_element.value = profile_config.join("#");

        console.log(profile_config_element.value);
        this.submit()
    });
});
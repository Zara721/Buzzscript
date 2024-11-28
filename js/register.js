document.addEventListener("DOMContentLoaded", () => {
    const username_adj = document.getElementById("username-adj");
    const display_adj = document.getElementById("display-adj")
    display_adj.textContent = username_adj.value;
    username_adj.addEventListener("change", () => {
        display_adj.textContent = username_adj.value;
    });

    const username_noun = document.getElementById("username-noun");
    const display_noun = document.getElementById("display-noun")
    display_noun.textContent = username_noun.value;
    username_noun.addEventListener("change", () => {
        display_noun.textContent = username_noun.value;
    });
});
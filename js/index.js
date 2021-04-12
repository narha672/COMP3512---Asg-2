document.addEventListener("DOMContentLoaded", () => {

    // Event Listener for Hamburger Menu
    document.querySelector('#hamburger-button').addEventListener("click", () => {
        const menu = document.querySelector('#hamburger-menu');

        if (menu.style.display == "none") {
            menu.style.display = "flex";
            return;
        }
        menu.style.display = "none";
    })
});
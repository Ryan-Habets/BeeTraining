console.log("menu.js is loaded!"); // Debugging log

// Function to open the menu
function openMenu() {
    console.log("Opening menu..."); // Debugging log
    const menuOverlay = document.getElementById('menu-overlay');
    if (menuOverlay) {
        menuOverlay.classList.add('open'); // Add the 'open' class to trigger the animation
    } else {
        console.error("Menu overlay element not found!");
    }
}

// Function to close the menu
function closeMenu() {
    console.log("Closing menu..."); // Debugging log
    const menuOverlay = document.getElementById('menu-overlay');
    if (menuOverlay) {
        menuOverlay.classList.remove('open'); // Remove the 'open' class to close the menu
    } else {
        console.error("Menu overlay element not found!");
    }
}
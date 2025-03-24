const menu_btn = document.getElementById("menu_btn");
const sidebar = document.getElementById("sidebar");

// Set sidebar to closed state initially
let isSidebarOpen = false;

menu_btn.addEventListener("click", function () {
    if (isSidebarOpen) {
        sidebar.classList.remove("open");
    } else {
        sidebar.classList.add("open");
    }
    isSidebarOpen = !isSidebarOpen; // Toggle state
});

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

// document.addEventListener("DOMContentLoaded", () => {
//     const form = document.querySelector("form");
//     const inputField = document.getElementById("inputField");
//     const errorMessage = document.getElementById("errorMessage");

//     form.addEventListener("submit", function(event) {
//         const inputValue = inputField.value.trim();

//         if (inputValue === "") {
//             event.preventDefault(); // Stops form submission
//             inputField.classList.add("shake");
//             errorMessage.style.visibility = "visible";

//             setTimeout(() => {
//                 inputField.classList.remove("shake");
//                 errorMessage.style.visibility = "hidden";
//             }, 500);
//         }
//     });
// });

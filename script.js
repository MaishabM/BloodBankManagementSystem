const menu_btn = document.getElementById("menu_btn");
const sidebar = document.getElementById("sidebar");

menu_btn.addEventListener("click", function() {
    // Toggle sidebar visibility
    if (sidebar.style.left === "0px") {
        sidebar.style.left = "-250px";
    } else {
        sidebar.style.left = "0px";
    }
});

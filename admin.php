<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN Dashboard</title>
    <link rel = "stylesheet" href = "admin.css">
</head>
<body>
    <header class = "header">
        <a href="#" id="menu_btn">☰ Menu</a>
        <h3 class = "welcome_msg"> Welcome back Admin! </h3>

        <div class = "right-btns">
            <a href = "search.php"> &#128269; Search </a>
            <a class = "logout-btn" href = "logout.php"> Logout </a>
        </div>
    </header>

    <aside id = "sidebar">
        <ul>
            <li>
                <a href = "addDonor.php"> Add Donor </a>
            </li>

            <li>
                <a href = "viewDonor.php"> View Donors </a>
            </li>

            <li>
                <a href = "donateBlood.php"> Donate Blood </a>
            </li>

            <li>
                <a href = "addPatient.php"> Add Patient </a>
            </li>

            <li>
                <a href = "viewPatient.php"> View Patients </a>
            </li>

            <li>
                <a href = ""> Issue Blood </a>
            </li>

            <li>
                <a href = "stock.php"> Inventory </a>
            </li>
        </ul>
    </aside>

    <script src="script.js"></script>

    <div class="content">
        <img class = "main_img" alt = "Error loading image..." src = "admin.png">
        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo dolores est amet deserunt, praesentium error facilis aut nesciunt vitae impedit?</p>
    </div>
</body>
</html>
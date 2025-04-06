<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="header">
        <a href="#" id="menu_btn">☰ Menu</a>
        <!-- <h3 class="welcome_msg">Your Dashboard</h3> -->

        <div class="right-btns">
            <a href="search.php">🔍 Search</a>
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>
    </header>

    <aside id="sidebar">
        <ul>
            <li><a href="addDonor.php">Add Donor</a></li>
            <li><a href="viewDonor.php">View Donors</a></li>
            <li><a href="donateBlood.php">Donate Blood</a></li>
            <li><a href="addPatient.php">Add Patient</a></li>
            <li><a href="viewPatient.php">View Patients</a></li>
            <li><a href="issueBlood.php">Issue Blood</a></li>
            <li><a href="stock.php">Inventory</a></li>
        </ul>
    </aside>

    <script src="script.js"></script>

    <div class="content">
        <p>Welcome to the Blood Bank Management System dashboard. Manage donors, patients, and inventory efficiently.</p>
        <img class="main_img" alt="Error loading image..." src="worker.jpg">

        <div class="dashboard-stats">
            <div class="stat-box">
                <h2>12</h2>
                <p>Total Donors</p>
            </div>
            <div class="stat-box">
                <h2>20</h2>
                <p>Blood Units Available</p>
            </div>
            <div class="stat-box">
                <h2>11</h2>
                <p>Patients in Need</p>
            </div>
        </div>

        <div class="quick-links">
            <div class="card">
                <a href="viewDonor.php">
                    <h3>👨‍⚕️ View Donors</h3>
                </a>
            </div>
            <div class="card">
                <a href="stock.php">
                    <h3>🩸 Blood Inventory</h3>
                </a>
            </div>
            <div class="card">
                <a href="issueBlood.php">
                    <h3>📦 Issue Blood</h3>
                </a>
            </div>
        </div>

    </div>
</body>
</html>

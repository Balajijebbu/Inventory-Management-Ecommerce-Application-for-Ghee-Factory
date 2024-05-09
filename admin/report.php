<!DOCTYPE html>

<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMA GHEE Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="images/uma ghee logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     
<style>
    /* Hide unnecessary elements in print */
    @media print {
        body * {
            visibility: hidden;
        }
        .print-container, .print-container * {
            visibility: visible;
        }
        .print-container {
            position: absolute;
            left: 0;
            top: 0;
        }
        .print-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .print-table th, .print-table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .print-table th {
            background-color: #f2f2f2;
        }
        .print-total {
            margin-top: 20px;
        }
    }
</style>
        
</head>
<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

            <div class="navbar-header">
    <a class="navbar-brand" href="dashboard.php">
        <img src="images/uma ghee logo.png" alt="homepage" class="dark-logo" style="max-height: 80px;max-width: 100px; margin-right: 70px;" />
    </a>
</div>


                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/uma ghee logo.png" alt="user" style="background-color:black;"class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All Products</a></li>
                                <li><a href="add_menu.php">Add Products</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                        <li> <a href="report.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Report</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">


<div class="print-container">
    <?php
    // Process the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the date range from the form
        $from_date = $_POST["from_date"];
        $to_date = $_POST["to_date"];
        
        // Query to retrieve orders within the specified date range and calculate total amount for all users
        $sql = "SELECT users.username, users_orders.date, users_orders.title, users_orders.price, users_orders.quantity, SUM(users_orders.price * users_orders.quantity) AS total_amount 
                FROM users 
                INNER JOIN users_orders ON users.u_id = users_orders.u_id 
                WHERE users_orders.date BETWEEN '$from_date' AND '$to_date' 
                GROUP BY users.username";
        $query = mysqli_query($db, $sql);

        // Display the order statements
        if (mysqli_num_rows($query) > 0) {
            echo "<table class='print-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>User Name</th>";
            echo "<th>Date</th>";
            echo "<th>Product</th>";
            echo "<th>Price</th>";
            echo "<th>Quantity</th>";
            echo "<th>Total Amount</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $total_earnings = 0; // Initialize total earnings

            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>{$row['username']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['total_amount']}</td>";
                echo "</tr>";

                $total_earnings += $row['total_amount']; // Accumulate total earnings
            }

            echo "</tbody>";
            echo "</table>";

            // Display total earnings statement
            echo "<p class='print-total'>Total Earnings: $total_earnings</p>";
        } else {
            echo "<p>No orders found within the specified date range.</p>";
        }
    }
    ?>
</div>

<div class="no-print">
    <!-- Add this form to your HTML -->
    <form method="post" action="">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="from_date">From Date</label>
                <input type="date" class="form-control mb-2" id="from_date" name="from_date" placeholder="From Date">
            </div>
            <div class="col-auto">
                <label class="sr-only" for="to_date">To Date</label>
                <input type="date" class="form-control mb-2" id="to_date" name="to_date" placeholder="To Date">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Get Orders</button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-success mb-2" id="printButton">Print</button>
            </div>
        </div>
    </form>
</div>

<script>
    // JavaScript to trigger printing when the print button is clicked
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>

            <?php include "include/footer.php" ?>

            <script src="js/lib/jquery/jquery.min.js"></script>
            <script src="js/lib/bootstrap/js/popper.min.js"></script>
            <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/sidebarmenu.js"></script>
            <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="js/custom.min.js"></script>

</body>

</html>
<?php
}
?>
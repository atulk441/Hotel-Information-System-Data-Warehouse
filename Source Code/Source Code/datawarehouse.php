<?php
session_start();
$_SESSION['selected_value'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: 300px auto;
            grid-template-columns: 1.02fr 4fr;
            /*change */
            grid-gap: 0.5rem;
            /*change */
        }

        .item_left {
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 120vh;
            padding: 15px 5px;
            background-color: rgb(231, 197, 245);
            color: black;
        }

        .item_right {
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 120vh;
            padding: 15px 5px;
            background-color: ghostwhite;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100%;
        }

        table {
            width: 70%;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            font-size: 16px;
        }

        .button-container {
            position: absolute;
            top: 12px;
            right: 12px;
            /* padding: 10px; */
        }


        .button-container:hover {
            background-color: grey;
        }

        .top-right-button {
            background-color: #4CAF50;
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        div a {
            text-decoration: none;
            color: black;
            font-size: 30px;
            /* border-bottom: 2px solid black; */
            display: flex;
            /* justify-content: center; */
            align-items: flex-start;
            height: 100%;
        }

        .item_left div {
            padding: 10px 0px 10px 0px;
        }


        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: bold;

        }



        #exception {
            padding-top: 30px;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr th {
            background-color: white;
        }

        .img_set {
            display: flex;
            flex-direction: row;

        }
    </style>
</head>


<body>
    <?php
    ?>

    <!-- container is grid -->
    <div class="container">


        <!-- items inside the grid are called grid items -->
        <div class="item_left">
            <div class="content" style="border: 2px solid #9f16da;">
                AKAMA
            </div>
            <div class="img_set">
                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/login-screen-3-719763.png" alt="" style="height: 50px; width:50px;margin-top: 22px;">
                <a id="exception" href="dashboard.php" style="margin-left:15px;">Dashboard</a>
            </div>
            <div class="img_set">
                <img src="hotel1.jpg" alt="" style="height: 50px; width:50px;margin-top: 0px; border-radius: 25px;">
                <a href="sdb1v2.php" style="margin-top: 10px; margin-left:15px;">Fairmont Resorts</a>
            </div>
            <div class="img_set">
                <img src="hotel2.jpg" alt="" style="height: 50px; width:50px;margin-top: 0px; border-radius: 25px;">
                <a href="sdb2v2.php" style="margin-top: 10px; margin-left:15px;">Four Seasons Resorts</a>
            </div>

            <div class="img_set">
                <img src="warehouse.png" alt="" style="height: 50px; width:50px;margin-top: 0px; border-radius: 25px;">
                <a href="datawarehouse.php" style="margin-top: 10px; margin-left:15px;">Warehouse Reports</a>
            </div>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['selected_value'] = $_POST['query_selector']; // Store selected value in session
        }
        ?>

        <div class="item_right">
            <form action="datawarehouse.php" method="POST">
                <label for="query_selector" style="margin: 0px 0px 10px 0px; font-size: 18px">Pick a query:</label>
                <select name="query_selector" style="margin: 0px 0px 10px 0px; font-size: 16px" id="queries">
                    <option value="empty" <?php echo ($_SESSION['selected_value'] == 'empty') ? 'selected' : 'selected'; ?>></option>
                    <option value="Query1" <?php echo ($_SESSION['selected_value'] == 'Query1') ? 'selected' : ''; ?>>Information about customers who stayed in both the branches</option>
                    <option value="Query2" <?php echo ($_SESSION['selected_value'] == 'Query2') ? 'selected' : ''; ?>>Maximum revenue earned by any branch</option>
                    <option value="Query3" <?php echo ($_SESSION['selected_value'] == 'Query3') ? 'selected' : ''; ?>>Number of Rooms Booked in March across different branches</option>
                    <option value="Query4" <?php echo ($_SESSION['selected_value'] == 'Query4') ? 'selected' : ''; ?>>Number of Rooms Booked of each occupancy</option>
                    <option value="Query5" <?php echo ($_SESSION['selected_value'] == 'Query5') ? 'selected' : ''; ?>>Customer Names who booked single occupancy rooms across all branches in April</option>
                </select>
                <input type="submit" value="Submit" style="cursor: pointer;">
            </form>
            <div class="button-container">
                <button class="top-right-button" onclick="window.location.href = 'dimensiontables.php';">Dimensions Table</button>
            </div>

            <br>
            <br>
            <div class="table-container">
                <?php
                if (isset($_POST['query_selector'])) {
                    $selectedValue = $_POST['query_selector'];

                    // Perform actions based on the selected value
                    switch ($selectedValue) {
                        case 'empty':
                            include("dw.php");
                            $sql = "SELECT * FROM facttable";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1'>";
                                echo '<caption style="font-weight: bold;">Fact Table</caption>';
                                echo "<tr><th>GuestID</th><th>RoomID</th><th>BranchID</th><th>Date</th><th>Total_Amount(&dollar;)</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["BranchID"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["Total_Amount"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            session_abort();
                            break;

                        case "Query1":
                            include("dw.php");
                            $sql = "SELECT f.GuestID, g.Name, g.Email, g.Phone, g.Address, g.Nation
                            FROM dim_guest g join facttable f on f.GuestID = g.GuestID
                            GROUP BY g.name, g.email
                            HAVING COUNT(g.email) > 1 and COUNT(g.name) > 1;";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1'>";
                                echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nation</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            $conn->close();

                            session_abort();
                            break;

                        case "Query2":
                            include("dw.php");
                            // echo round(30.222, 2);
                            $sql = 'create view revenue_earned as
                                    select  b.Name, b.Location, b.Number_Of_Rooms, b.Contact, sum(f.Total_Amount) as Revenue_Earned 
                                    from facttable f join dim_branch b on f.BranchID=b.BranchID group by f.BranchID;';
                            $result = mysqli_query($conn, $sql);

                            $sql = 'select Name, Location, Number_Of_Rooms, Contact, max(Revenue_Earned) as Maximum_Revenue_Earned from revenue_earned;';
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                                echo "<table border='1'>";
                                echo "<tr><th style='width: 15%;'>Branch Name</th><th style='width: 40%;'>Location</th><th>Number of Rooms</th><th style='width: 15%;'>Contact</th><th>Maximum Revenue(&dollar;)</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Location"] . "</td><td>" . $row["Number_Of_Rooms"] . "</td><td>" . $row["Contact"] . "</td><td>" . round($row["Maximum_Revenue_Earned"], 2) . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }

                            $sql = 'drop view revenue_earned;';
                            $result = mysqli_query($conn, $sql);
                            $conn->close();
                            session_abort();
                            break;

                        case "Query3":
                            include("dw.php");
                            $sql = "Select b.Name, count(f.GuestID) as Num_Rooms from facttable f join dim_branch b on f.BranchID = b.BranchID join dim_guest g on g.GuestID = f.GuestID where f.Date>='2024-03-01' and f.Date< '2024-04-01' group by f.BranchID;";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1' style='width: 35%;'>";
                                echo "<tr><th>Branch Name</th><th>Number of Rooms Booked (March)</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Num_Rooms"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            session_abort();
                            break;

                        case "Query4":
                            include("dw.php");
                            $sql = "Select  r.Occupancy, count(r.Occupancy) as NumRooms from facttable f join dim_room r on f.RoomID = r.RoomID group by occupancy;
                            ";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1' style='width: 30%;'>";
                                echo "<tr><th>Occupancy</th><th>Number of Rooms Booked</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Occupancy"] . "</td><td>" . $row["NumRooms"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            session_abort();
                            break;

                        case "Query5":
                            include("dw.php");
                            $sql = "Select g.Name as Guest_Name, b.Name as Branch_Name, r.RoomType  from facttable f join dim_guest g on f.GuestID = g.GuestID join dim_room r on f.RoomID = r.RoomID join dim_branch b on b.BranchID = f.BranchID where f.Date>='2024-04-01' and f.Date <='2024-04-30' and r.Occupancy=1;";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1' style='width: 40%;'>";
                                echo "<tr><th>Guest Name</th><th>Branch Name</th><th>Room Type</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Guest_Name"] . "</td><td>" . $row["Branch_Name"] . "</td><td>" . $row["RoomType"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            session_abort();
                            break;
                    } //end switch


                } //end if
                else {
                    include("dw.php");
                    $sql = "SELECT * FROM facttable";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo '<caption style="font-weight: bold;">Fact Table</caption>';
                        echo "<tr><th>GuestID</th><th>RoomID</th><th>BranchID</th><th>Date</th><th>Total_Amount(&dollar;)</th><tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["BranchID"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["Total_Amount"] . "</td></tr>";
                        }
                        echo "</table >";
                    } else {
                        echo "0 results";
                    }
                    // session_abort();
                }

                ?>
            </div>
        </div>

    </div>

</body>

</html>
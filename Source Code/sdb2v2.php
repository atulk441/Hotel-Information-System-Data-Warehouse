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

        div a {
            text-decoration: none;
            color: black;
            font-size: 30px;
            /* border-bottom: 2px solid black; */
            /*change */
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


        .table-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1.2fr 1fr;
            grid-gap: 1rem;

        }

        .grid_item {
            /* border: 2px solid black; */
            /* background-color: rgb(228, 188, 228); */
            padding: 5px;
            display: flex;
            justify-content: center;
        }

        .grid_item:first-child {
            grid-column-start: 1;
            grid-column-end: 3;

        }

        .grid_item:nth-child(2) {
            grid-row-start: 2;
            grid-row-end: 4;
        }

        table {
            width: 70%;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            font-size: 16px;
        }

        #guest table {
            width: 95%;
            /* height: fit-content */
        }

        #roominfo {
            height: auto;
        }

        #reservation table {
            width: 80%;
        }

        #roominfo td,
        th {
            padding: 0px;
        }


        #roomdetails td {
            padding: 0px;
        }

        #query2 {
            padding: 15px;
            height: 50px;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr th {
            background-color: white;
        }

        #query3 {}

        /*change */
        .img_set {
            display: flex;
            flex-direction: row;

        }

        /* img{
           
        } */
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
            <!-- change -->
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
            <!-- <div><a href="sdb2v2.php">Four Seasons Resorts</a></div> -->
            <!-- <div><a href="datawarehouse.php">Warehouse Reports</a></div> -->
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['selected_value'] = $_POST['query_selector']; // Store selected value in session
        }
        ?>
        <div class="item_right">
            <form action="sdb2v2.php" method="POST">
                <label for="query_selector" style="margin: 0px 0px 10px 0px; font-size: 18px">Pick a query:</label>
                <select name="query_selector" style="margin: 0px 0px 10px 0px; font-size: 16px" id="queries">
                    <option value="empty" <?php echo ($_SESSION['selected_value'] == 'empty') ? 'selected' : 'selected'; ?>></option>
                    <option value="Query1" <?php echo ($_SESSION['selected_value'] == 'Query1') ? 'selected' : ''; ?>>Display Information of International Travellors</option>
                    <option value="Query2" <?php echo ($_SESSION['selected_value'] == 'Query2') ? 'selected' : ''; ?>>Customers information who checked-in in April</option>
                    <option value="Query3" <?php echo ($_SESSION['selected_value'] == 'Query3') ? 'selected' : ''; ?>>Suite room booked by customers</option>

                </select>
                <input type="submit" value="Submit" style="cursor: pointer;">
            </form>

            <div class="button-container">
                <button class="top-right-button" onclick="window.location.href = 'insertdatasdb2.php';">INSERT DATA</button>
            </div>

            <br>
            <br>
            <?php

            include("database2.php");
            $sql = "DELETE g, r
        FROM guest g
        JOIN reservation r ON g.guestid = r.guestid
        WHERE datediff(now(), r.checkout) > 20;";
            $result = mysqli_query($conn, $sql);
            $conn->close();

            if (isset($_POST['query_selector'])) {
                $selectedValue = $_POST['query_selector'];

                // Perform actions based on the selected value
                switch ($selectedValue) {
                    case 'empty':
                        echo '<div class="table-container">';
                        echo '<div class="grid_item" id="guest">';

                        include("database2.php");

                        $sql = "SELECT * FROM guest";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Guest</caption>';
                            echo "<tr><th>GuestID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nationality</th><th>Amount Paid(&dollar;)</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nationality"] . "</td><td>" . $row["AmountPaid"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }

                        $conn->close();

                        echo "</div>";
                        echo '<div class="grid_item" id="roominfo">';
                        include("database2.php");
                        $sql = "SELECT * FROM roominfo";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Room Info</caption>';
                            echo "<tr><th>Room No</th><th>Room Size</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["RoomNo"] . "</td><td>" . $row["RoomSize"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();



                        echo "</div>";

                        echo '<div class="grid_item" id="roominfo">';

                        include("database2.php");

                        $sql = "SELECT * FROM reservation";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Reservation</caption>';
                            echo "<tr><th>Guest ID</th><th>Room No</th><th>Check-in</th><th>Check-out</th><th>Number Of Guests</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomNo"] . "</td><td>" . $row["Checkin"] . "</td><td>" . $row["Checkout"] . "</td><td>" . $row["NumberOfGuests"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();

                        echo "</div>";

                        echo '<div class="grid_item" id="roomdetails">';

                        include("database2.php");
                        $sql = "SELECT * FROM roomdetails";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Room Details</caption>';
                            echo "<tr><th>Room Size</th><th>Max. Number of Guest</th><th>Availability</th><th>Price</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["RoomSize"] . "</td><td>" . $row["MaximumNumberOfGuests"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["Price"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        echo '</div>';
                        session_abort();
                        break;

                    case 'Query1':
                        echo '<div class="grid_item" id="query1" style="height: 55%;">';
                        include("database2.php");
                        $sql = "Select GuestID, Name, Email, Phone, Nationality from guest where not(Nationality = 'Canada');";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width: 70%; height:40%;'>";
                            echo "<tr><th>GuestID</th><th>Name</th><th>Email</th><th>Phone</th><th>Nationality</th><tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Nationality"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        session_abort();
                        break;

                    case 'Query2':
                        echo '<div class="grid_item" style="height: 35%;">';
                        include("database2.php");
                        $sql = "Select g.GuestID, g.Name, g.Email from guest g join reservation r on g.GuestID = r.GuestID where month(checkin)=4;";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width: 70%; height:40%;'>";
                            echo "<tr><th>GuestID</th><th>Name</th><th>Email</th><tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        session_abort();
                        break;

                    case 'Query3':
                        echo '<div class="grid_item" style="height: 25%;">';
                        include("database2.php");
                        $sql = 'Select g.GuestID, g.Name, g.Phone, ri.RoomSize, rd.Price from guest g join reservation r on g.GuestID=r.GuestID join roominfo ri on ri.RoomNo = r.RoomNo join roomdetails rd on ri.RoomSize = rd.RoomSize where rd.RoomSize="Suite Room";';
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width: 70%; height:40%;'>";
                            echo "<tr><th>GuestID</th><th>Name</th><th>Phone</th><th>Room Size</th><th>Price</th><tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["RoomSize"] . "</td><td>" . $row["Price"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        session_abort();
                        break;
                } //end switch
            }
            //end if
            else {
                echo '<div class="table-container">';
                echo '<div class="grid_item" id="guest">';

                include("database2.php");

                $sql = "SELECT * FROM guest";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo '<caption style="font-weight: bold;">Guest</caption>';
                    echo "<tr><th>GuestID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nationality</th><th>Amount Paid(&dollar;)</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nationality"] . "</td><td>" . $row["AmountPaid"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }

                $conn->close();

                echo "</div>";
                echo '<div class="grid_item" id="roominfo">';
                include("database2.php");
                $sql = "SELECT * FROM roominfo";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo '<caption style="font-weight: bold;">Room Info</caption>';
                    echo "<tr><th>Room No</th><th>Room Size</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["RoomNo"] . "</td><td>" . $row["RoomSize"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }
                $conn->close();



                echo "</div>";

                echo '<div class="grid_item" id="roominfo">';

                include("database2.php");

                $sql = "SELECT * FROM reservation";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo '<caption style="font-weight: bold;">Reservation</caption>';
                    echo "<tr><th>Guest ID</th><th>Room No</th><th>Check-in</th><th>Check-out</th><th>Number Of Guests</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomNo"] . "</td><td>" . $row["Checkin"] . "</td><td>" . $row["Checkout"] . "</td><td>" . $row["NumberOfGuests"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }
                $conn->close();

                echo "</div>";

                echo '<div class="grid_item" id="roomdetails">';

                include("database2.php");
                $sql = "SELECT * FROM roomdetails";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo '<caption style="font-weight: bold;">Room Details</caption>';
                    echo "<tr><th>Room Size</th><th>Max. Number of Guest</th><th>Availability</th><th>Price</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["RoomSize"] . "</td><td>" . $row["MaximumNumberOfGuests"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["Price"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }
                $conn->close();
                echo '</div>';
                echo '</div>';
                session_abort();
            }



            ?>
        </div>

    </div>

</body>

</html>
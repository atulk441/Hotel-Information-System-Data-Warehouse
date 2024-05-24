<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400..800&display=swap" rel="stylesheet">

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

        .sub_container {
            /* border: 2px solid white; */
            /* margin: 106px 80px; */
            /* padding: 75px; */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .new_pos {
            /* position: relative;
            left: 20; */
            margin: 0px 500px 0px 0px;
        }

        .form-group input {
            text-align: center;
            display: block;
            width: 376px;
            padding: 1px;
            font-size: 25px;
            border: 2px solid black;
            margin: 8px auto;
            font-family: "Baloo Bhaijaan 2", sans-serif;
        }

        .form-group select {
            text-align: center;
            display: block;
            width: 376px;
            padding: 1px;
            font-size: 25px;
            border: 2px solid black;
            margin: 8px auto;


            font-family: "Baloo Bhaijaan 2", sans-serif;
        }

        .img_set {
            display: flex;
            flex-direction: row;

        }
    </style>
</head>


<body>

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

        <div class="item_right">
            <div class="button-container">
                <button class="top-right-button" onclick="window.location.href = 'sdb1v2.php';">Go Back</button>
            </div>

            <br>
            <!-- <br> -->
            <h2 style="text-align: center;">Customer Information</h2>
            <div class="sub_container">
                <form action="insertdatasdb1.php" method="post">
                    <div class="form-group new_pos" style="display:inline-block;">
                        <input type="text" name="name" id="" placeholder="Enter your name">
                    </div>
                    <div class="form-group" style="display: inline-block; position: absolute; right:50px;    margin: 7px 194px 0px 0px">
                        <label>
                            <h3>Enter check-in date:<h3>
                        </label>
                    </div>
                    <div class="form-group" style="display: inline-block; position: absolute; right:25px;margin: 39px 0px 0px 0px;">
                        <input type="date" name="checkin" id="" placeholder="Enter the check-in date">
                    </div>
                    <br>
                    <div class="form-group new_pos" style="display:inline-block;">
                        <input type="text" name="email" id="" placeholder="Enter your email">
                    </div>
                    <div class="form-group" style="display: inline-block; position: absolute; right:50px;    margin: 35px 183px 0px 0px">
                        <label>
                            <h3>Enter check-out date:<h3>
                        </label>
                    </div>
                    <div class="form-group" style="display:inline-block;position: absolute; right:25px; margin: 67px 0px 0px 0px;">
                        <input type="date" name="checkout" id="" placeholder="Enter the check-out date">
                    </div>
                    <div class="form-group new_pos">
                        <input type="text" name="phone" id="" placeholder="Enter your phone#">
                    </div>
                    <div class="form-group new_pos">
                        <input type="text" name="address" id="" placeholder="Enter your address">
                    </div>
                    <div class="form-group new_pos">
                        <input type="text" name="nation" id="" placeholder="Enter your nationality">
                    </div>

                    <div class="form-group new_pos">
                        <input type="text" name="numofguests" id="" placeholder="Enter the number of guests">
                    </div>
                    <div class="form-group new_pos">
                        <select name="room_selector" class="form-group" id="room">
                            <option value="empty">Select Room Type:</option>
                            <option value="Single">Single (Max: 1 person)</option>
                            <option value="Double">Double (Max: 2 persons)</option>
                            <option value="Deluxe">Deluxe(Max: 4 persons)</option>
                        </select>
                    </div>
                    <br>
                    <button style=" display: block; margin: 4px 0px 4px 350px; width: 376px; padding:5px; cursor:pointer;" class="btn">Submit</button>
                </form>
            </div>


            <?php

            include("database1.php");
            // $sql = "SELECT GuestID FROM guest ORDER BY guestid DESC LIMIT 1;";
            // $result = mysqli_query($conn, $sql);

            // if ($result->num_rows > 0) {
            //     while ($row = $result->fetch_assoc()) {
            //         $guest_id =  $row["GuestID"];
            //     }
            // }

            $guest_id = file_get_contents('sdb1GuestID.txt');
            $status = 0;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST["nation"]) && !empty($_POST['room_selector'])
                    && !empty($_POST['checkin']) && !empty($_POST['checkout']) && !empty($_POST['numofguests'])
                ) {
                    $guest_id += 1;
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $nation = $_POST["nation"];
                    $amount = 0;



                    $index = 0;
                    $room_avail = [];
                    $room_type = $_POST['room_selector'];
                    $check_in = $_POST['checkin'];
                    $check_out = $_POST['checkout'];
                    $num_of_guests = $_POST['numofguests'];


                    $room_id = -1;
                    // include("database1.php");
                    $sql =  "select rii.RoomID from roominfo rii where rii.RoomID not in
    (select distinct(ri.RoomID) from roominfo ri join reservation r on r.RoomID = ri.RoomID where ri.RoomType='$room_type' and r.Check_out > now() ) and rii.RoomType='$room_type';";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $room_avail[$index] =  $row["RoomID"];
                            $index += 1;
                        }
                        $room_id = $room_avail[0];
                    } else {
                        echo "<script>alert('Sorry, No Rooms Of This Type Are Available.');</script>";
                    }
                    // Need to uncomment following two lines
                    if (($room_type == "Single" && $num_of_guests > 1) || ($room_type == "Double" && $num_of_guests > 2) || $room_type == "Deluxe" && $num_of_guests > 4) {
                        echo "<h3 style='color: red; text-align:center; margin: 45px 0px 0px 208px;'>Single room can only accomodate maximum of 1 person.</h3> <h3 style='color: red;text-align:center;margin: 0px 0px 0px 208px;'>Double room can only accomodate maximum of 2 persons.</h3> <h3 style='color: red;text-align:center;margin: 0px 0px 0px 208px;'>Deluxe room can only accomodate maximum of 4 person.</h3>";
                    } else {
                        $sql = "INSERT INTO guest VALUES ('$guest_id', '$name', '$email', '$phone', '$address', '$nation', '$amount')";
                        mysqli_query($conn, $sql);
                        $sql = "INSERT INTO reservation VALUES ('$guest_id', '$room_id', '$check_in', '$check_out', '$num_of_guests')";
                        mysqli_query($conn, $sql);

                        $sql = "UPDATE reservation r
            inner join guest g on g.GuestID = r.GuestID inner join roominfo ri on r.RoomID = ri.RoomID inner join roomdetails rd on ri.RoomType = rd.RoomType
            set g.amount = datediff(r.check_out, r.check_in)*rd.PricePerNight;";
                        mysqli_query($conn, $sql);
                        $status = 1;

                        $sql = "Select Amount from guest where guestid = '$guest_id';";
                        $fetched_res = mysqli_query($conn, $sql);
                        if ($fetched_res && $fetched_res->num_rows > 0) {
                            $row = $fetched_res->fetch_assoc();
                            $updatedAmount = $row["Amount"];
                        }
                        // echo $updatedAmount;
                    }
                    $conn->close();

                    if ($status == 1) {
                        include("dw.php");
                        $sql = "INSERT INTO facttable VALUES ('$guest_id', '$room_id', 'Akama_1', '$check_in', '$updatedAmount')";
                        mysqli_query($conn, $sql);
                        $sql = "INSERT INTO dim_guest VALUES ('$guest_id', '$name', '$phone', '$email', '$address', '$nation', '$check_out')";
                        mysqli_query($conn, $sql);

                        $sql = "SELECT * FROM dim_room WHERE RoomID = '$room_id'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        } else {
                            if ($room_type = "Single") {
                                $sql = "INSERT INTO dim_room VALUES ('$room_id', '$room_type', 1, 240.55)";
                                mysqli_query($conn, $sql);
                            } elseif ($room_type = "Double") {
                                $sql = "INSERT INTO dim_room VALUES ('$room_id', '$room_type', 2, 425)";
                                mysqli_query($conn, $sql);
                            } elseif ($room_type = "Deluxe") {
                                $sql = "INSERT INTO dim_room VALUES ('$room_id', '$room_type', 4, 800)";
                                mysqli_query($conn, $sql);
                            }
                        }

                        $day = date('d', strtotime($check_in));
                        $month = date('m', strtotime($check_in));
                        $year = date('Y', strtotime($check_in));

                        $sql = "SELECT * FROM dim_date d WHERE d.DATE = '$check_in'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        } else {
                            $sql = "INSERT INTO dim_date VALUES ('$check_in', $day, $month, $year)";
                            mysqli_query($conn, $sql);
                        }
                        file_put_contents('sdb1GuestID.txt', $guest_id);
                        echo "<script>alert('Entry Successfull :)');</script>";
                    }
                } else {
                    echo "<script>alert('Please fill all the required fields.');</script>";
                }
            }


            session_abort();

            ?>


        </div>

    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("database1.php");
    // Following are two ways to connect to the MySQL database
    // 1. MySQLi Extension
    // PDO (PHP Data Objects)

    $sql = "SELECT * FROM guest";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nation</th><th>Amount</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td><td>" . $row["Amount"] . "</td></tr>";
        }
        echo "</table >";
    } else {
        echo "0 results";
    }

    $conn->close();

    include("database1.php");

    $sql = "SELECT * FROM reservation";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Guest ID</th><th>Room ID</th><th>Check-in</th><th>Check-out</th><th>Numer Of Guests</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Check_in"] . "</td><td>" . $row["Check_out"] . "</td><td>" . $row["NumberOfGuests"] . "</td></tr>";
        }
        echo "</table >";
    } else {
        echo "0 results";
    }
    $conn->close();

    include("database1.php");
    $sql = "SELECT * FROM roominfo";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Room ID</th><th>Room Type</th><th>Occupancy</th><th>Availability</th><th>Price Per Night</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["RoomID"] . "</td><td>" . $row["RoomType"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["PricePerNight"] . "</td></tr>";
        }
        echo "</table >";
    } else {
        echo "0 results";
    }
    $conn->close();

    // real works starts here
    include("database1.php");
    $sql = "SELECT * FROM reservation r inner join guest g on g.GuestID = r.GuestID inner join roominfo ri on r.RoomID = ri.RoomID order by r.GuestID";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Guest ID</th><th>Room ID</th><th>Check-in</th><th>Check-out</th><th>Numer Of Guests</th><th>Guest ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nation</th><th>Amount</th><th>Room ID</th><th>Room Type</th><th>Occupancy</th><th>Availability</th><th>Price Per Night</th><tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Check_in"] . "</td><td>" . $row["Check_out"] . "</td><td>" . $row["NumberOfGuests"] . "</td><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td><td>" . $row["Amount"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["RoomType"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["PricePerNight"] . "</td></tr>";
        }
        echo "</table >";
    } else {
        echo "0 results";
    }

    $sql = "UPDATE reservation r
    inner join guest g on g.GuestID = r.GuestID inner join roominfo ri on r.RoomID = ri.RoomID 
    set g.amount = datediff(r.check_out, r.check_in)*ri.PricePerNight;";

    try {
        mysqli_query($conn, $sql);
        echo "Updated<br>";
    } catch (mysqli_sql_exception) {
        echo "Error<br>";
    }
    $conn->close();

    // g.GuestID, r.RoomID, g.Name, g.Phone, r.Check_in, r.Check_out, ri.RoomType, ri.PricePerNight, g.Amount

    include("database1.php");
    $sql = "SELECT * FROM reservation r inner join guest g on g.GuestID = r.GuestID inner join roominfo ri on r.RoomID = ri.RoomID order by r.GuestID";
    $result = mysqli_query($conn, $sql);
    $branch_id = "Akama_1";

    $store_guestID = [];
    $store_RoomID = [];
    $store_guestDate = [];
    $store_amount = [];

    $dimGuest_guestID = [];
    $dimGuest_name = [];
    $dimGuest_phone = [];
    $dimGuest_email = [];
    $dimGuest_address = [];
    $dimGuest_nation = [];
    $dimGuest_checkout = [];

    $dimRoom_roomID = [];
    $dimRoom_roomType = [];
    $dimRoom_occupancy = [];
    $dimRoom_pricePerNight = [];

    $dimBranch_branchID = 13403;
    $dimBranch_branchName = "ABC";
    $dimBranch_branchLocation = "ABC";
    $dimBranch_numOfRooms = 58;
    $dimBranch_contact = "ABC";

    // echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Check_in"] . "</td><td>" . $row["Check_out"] . "</td><td>" . $row["NumberOfGuests"] . "</td><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td><td>" . $row["Amount"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["RoomType"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["PricePerNight"] . "</td></tr>";




    $index = 0;

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Guest ID</th><th>Room ID</th><th>Name</th><th>Phone</th><th>Check-in</th><th>Check-out</th><th>Room Type</th><th>Price Per Night</th><th>Amount</th><tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Check_in"] . "</td><td>" . $row["Check_out"] . "</td><td>" . $row["RoomType"] . "</td><td>" . $row["PricePerNight"] . "</td><td>" . $row["Amount"] . "</td></tr>";
            $store_guestID[$index] = $row["GuestID"];
            $store_RoomID[$index] = $row["RoomID"];
            $store_guestDate[$index] = $row["Check_in"];
            $store_amount[$index] = $row["Amount"];

            $dimGuest_guestID[$index] = $row["GuestID"];
            $dimGuest_name[$index] = $row["Name"];
            $dimGuest_phone[$index] = $row["Phone"];
            $dimGuest_email[$index] = $row["Email"];
            $dimGuest_address[$index] = $row["Address"];
            $dimGuest_nation[$index] = $row["Nation"];
            $dimGuest_exitDate[$index] = $row["Check_out"];


            $dimRoom_roomID[$index] = $row["RoomID"];
            $dimRoom_roomType[$index] = $row["RoomType"];
            $dimRoom_occupancy[$index] = $row["Occupancy"];
            $dimRoom_pricePerNight[$index] = $row["PricePerNight"];


            $dimDate_date[$index] = $row["Check_in"];
            $dimDate_date[$index] = date($dimDate_date[$index]);
            $dimDate_day[$index] = date('d', strtotime(date($dimDate_date[$index])));
            $dimDate_month[$index] = date('m', strtotime(date($dimDate_date[$index])));
            $dimDate_year[$index] = date('Y', strtotime(date($dimDate_date[$index])));

            $dimDate_date[$index] =  strval($row["Check_in"]);

            echo $dimDate_date[$index];
            echo " ";
            echo $dimDate_day[$index];
            echo " ";
            echo $dimDate_month[$index];
            echo " ";
            echo $dimDate_year[$index];
            echo "<br>";


            $index += 1;
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    for ($i = 0; $i < count($dimRoom_roomID);) {
        for ($j = $i + 1; $j < count($dimRoom_roomID);) {
            if ($i != $j) {
                if ($dimRoom_roomID[$i] == $dimRoom_roomID[$j]) {
                    unset($dimRoom_roomID[$j]);
                    unset($dimRoom_roomType[$j]);
                    unset($dimRoom_occupancy[$j]);
                    unset($dimRoom_pricePerNight[$j]);

                    $dimRoom_roomID = array_values($dimRoom_roomID);
                    $dimRoom_roomType = array_values($dimRoom_roomType);
                    $dimRoom_occupancy = array_values($dimRoom_occupancy);
                    $dimRoom_pricePerNight = array_values($dimRoom_pricePerNight);
                }
            }
            $j += 1;
        }
        $i += 1;
    }


    include("dw.php");
    $sql = "INSERT INTO dim_branch VALUES('$dimBranch_branchID', ' $dimBranch_branchName', ' $dimBranch_branchLocation', '$dimBranch_numOfRooms', '$dimBranch_contact')";
    $result = mysqli_query($conn, $sql);



    $index_insert = 0;
    $sql = "ALTER TABLE dim_date MODIFY DATE VARCHAR(11)";
    $result = mysqli_query($conn, $sql);

    while ($index_insert < $index) {
        $sql = "INSERT INTO facttable(GuestID, RoomID, BranchID, Date, Total_Amount) VALUES('$store_guestID[$index_insert]', '$store_RoomID[$index_insert]', 'Akama_1','$store_guestDate[$index_insert]',' $store_amount[$index_insert]')";
        $result = mysqli_query($conn, $sql);

        $sql = "INSERT INTO dim_guest VALUES('$dimGuest_guestID[$index_insert]', '$dimGuest_name[$index_insert]',  '$dimGuest_phone[$index_insert]' , '$dimGuest_email[$index_insert]', ' $dimGuest_address[$index_insert]', ' $dimGuest_nation[$index_insert]', ' $dimGuest_exitDate[$index_insert]' )";
        $result = mysqli_query($conn, $sql);


        $sql = "INSERT INTO dim_date VALUES(   '$dimDate_date[$index_insert]'  , '$dimDate_day[$index_insert]', '$dimDate_month[$index_insert]', '$dimDate_year[$index_insert]')";
        $result = mysqli_query($conn, $sql);
        // alter table temp_table1 modify new_crit int;



        // $sql = "INSERT INTO dim_room VALUES('$udimRoom_roomID[$index_insert]', '$udimRoom_roomType[$index_insert]', '$udimRoom_occupancy[$index_insert]', '$udimRoom_pricePerNight[$index_insert]')";
        // $result = mysqli_query($conn, $sql);

        // $sql = "INSERT INTO dim_date VALUES('date($dimDate_date[$index])', `date('d', strtotime(date($dimDate_date[$index])))`, `date('m', strtotime(date($dimDate_date[$index])))`, `date('Y', strtotime(date($dimDate_date[$index])))` )";
        // $result = mysqli_query($conn, $sql);
        $index_insert += 1;
    }

    $sql = "ALTER TABLE dim_date MODIFY DATE DATE";
    $result = mysqli_query($conn, $sql);


    $index_insert = 0;
    while ($index_insert < count($dimRoom_roomID)) {

        // STR_TO_DATE('$date', '%m/%d/%Y')
        $sql = "INSERT INTO dim_room VALUES('$dimRoom_roomID[$index_insert]', '$dimRoom_roomType[$index_insert]', '$dimRoom_occupancy[$index_insert]', '$dimRoom_pricePerNight[$index_insert]')";
        $result = mysqli_query($conn, $sql);

        $index_insert += 1;
    }


    $conn->close();


    echo "</table >";

    ?>
</body>

</html>
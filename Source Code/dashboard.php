<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-color: rgb(231, 197, 245);
            height: 95vh;
            padding: 15px 5px;
        }

        .item_right {
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 100vh;
            /* padding: 15px 5px; */
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

        /* contact section */
        #img_src {
            position: relative;
        }

        #img_src::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.7;
            background: url('dashimage.jpg') no-repeat center center/cover;
        }

        .img_set {
            display: flex;
            flex-direction: row;

        }

        #h1 {
            font-size: 70px;
            text-align: end;
            position: fixed;
            bottom: 0px;
            right: 20px;
            color: white;
            padding: 0px;
            border-radius: 5px;
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

        #akama-name {
            text-align: center;
            margin-top: 120px;
            margin-bottom: 0px;
            font-size: 100px;
            color: white;
            color: rgb(104, 0, 138);
        }

        #desc {

            text-align: center;
            margin-top: 0px;
            font-size: 55px;
            color: white;

            position: absolute;
            top: 230px;
            left: 176px;
            color: rgb(104, 0, 138);

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

        <div class="item_right" id="img_src">
            <div class="button-container">
                <button class="top-right-button" onclick="window.location.href = 'loginpage.php';">Sign Out</button>
            </div>

            <?php
            $username = file_get_contents('username.txt');
            echo '<h1 id="h1">Hello, ' . $username . '</h1>';
            ?>

            <h1 id="akama-name" style="font-family: 'Baloo Bhaijaan 2', sans-serif;">AKAMA</h1>
            <h1 id="desc" style="font-family: 'Baloo Bhaijaan 2', sans-serif;">Hotel Information System Data Warehouse</h1>

            <!-- <h1 id="h2">Welcome to</h1>
            <h1 id="h3" style="font-size: 36px;">AKAMA's Hotel Information System Data Warehouse</h1> -->

        </div>

    </div>

</body>

</html>
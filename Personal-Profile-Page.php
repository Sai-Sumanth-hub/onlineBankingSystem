<?php 
session_start();
if (isset($_SESSION['USER'])) {
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Transfer</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

    <style>
        body {
            padding: 0;margin: 0;
        }
        .logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 10vw;
            z-index: 2;
        }
        .container {
            position: fixed;
            top: 0;
            width: 100%;height: 100%;
            background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSbe7Al4VSvLs5wnrSOO-lcIpalkXllQri_Nw&usqp=CAU);
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile {
            font-family: 'Nunito Sans', sans-serif;
            width: 55%;
            height: 64vh;
            padding: 2%;
            background-color: whitesmoke;
            box-shadow: 0 0 10px black, 0 0 20px black,0 0 40px black,0 0 60px grey;
            border-radius: 40px;
        }
        .pcont {
            width: 100%;
            height: 100%;
            border: 1px solid black;
        }
        .pcont > div {
            display: inline-block;
            border: 1px solid red;
        }
        .idiv {
            width: 26%;
            height: 52%;
            border-radius: 50%;
            overflow: hidden;
        }
        .txt1 {
            height: 52%;
            width: 65%;
            float: right;
        }
        #name {
            font-size: xx-large;
            text-transform: uppercase;
        }
        #ppic {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

    
    
    <div class="container">
        <a href="home-page.php"><img src="Logo-PixTeller2.png" alt="logo" class="logo"></a>
        
        <div class="profile">
            <div class="pcont">
                <div class="idiv">
                <img id="ppic" src="https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png" alt="">
                </div>

                <div class="txt1">
                    <span id="name"><?php echo $_SESSION['USER']; ?></span>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
    <?php }else{ echo "Please <a href='loginpage.php'><b>Login</b></a> to view this page.";} ?>
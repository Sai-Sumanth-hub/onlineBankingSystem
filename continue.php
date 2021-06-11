<?php 
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whale Bank</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Nunito Sans', sans-serif;
        }
        .cont {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('sbg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .signcont {
            width: 60%;
            font-family: 'Nunito Sans', sans-serif;
            box-shadow: 0 0 15px black;
            background-color: rgba(250,250,250,0.7);
            padding:3% 1%;
        }
        
        p,h1 {text-align: center;}
        .continue {
            width: 20%;
            height: 5vh;
            background-color: rgba(35, 164, 255 ,0.3);
            border: 1px solid rgba(35, 164, 255 ,0.8);
            cursor: pointer;
            font-size: 2.4vh;
        }
        
        @media screen and (max-width: 900px){
            .signcont {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="cont">
        <div class="signcont">
            <?php if ($_GET['message'] != "Account with that email Id already Exists!") { ?>
                <h1 style="color:#E40000;"><?php echo $_GET['message']; ?></h1>
                <p><a href="home-page.php"><button class="continue">Continue</button></a></p>
            <?php } elseif (isset($_GET['editfail'])){ ?>
                <h1 style="color:#E40000;"><?php echo "Something went Wrong! Try Again!"; ?></h1>
                <p><a href="w-profilepage.php"><button class="continue">Continue</button></a></p>
            <?php }else { ?>
                <h1 style="color:tomato;"><?php echo $_GET['message']; ?></h1>
                <p><a href="register-page.php"><button class="continue">Try Again</button></a></p>
            <?php } ?>
        </div>
    </div>

</body>
</html>
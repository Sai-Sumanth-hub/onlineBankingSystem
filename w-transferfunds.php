<?php
session_start();
if ($_SESSION['EID'] != 'admin@gmail.com') {?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whale Bank</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            padding:0;
            margin:0;
            font-family: 'Roboto', sans-serif;
        }
        .background-img {
        background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('home.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100vw;
        height: 100vh;
    }
    .topnavbar {
        background-color: rgb(29, 48, 48);
        display: flex;
        align-items: center;
        padding-left: 5%;
        user-select:none;
    }
    .lls {
        margin-top: 0.5%;
        margin-right: 1%;
    }
    .logout {
        position:absolute;
        right:5px;
        top:15px;
        width:8%;
        font-size:1.2vw;
        height:6vh;
        cursor:pointer;
        border:none;
        border-radius:6px;
        background-color:rgba(246, 218, 61,0.8);
        color:black;
    }
    .subcont {
        width:30%;
        margin:5% 35%;
        background-color:white;
    }
    form {border: 3px solid #f1f1f1;}

input[type=number], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: left;
  padding-left:3%;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
.logout {
        position:absolute;
        right:5px;
        top:15px;
        width:8%;
        font-size:1.2vw;
        height:6vh;
        cursor:pointer;
        border:none;
        border-radius:6px;
        background-color:rgba(246, 218, 61,0.8);
        color:black;
    }

/* Change styles for span and cancel button on extra small screens */

    @media screen and (max-width:600px){
        
        .logout {
            font-size:12px;
            width:20%;
        }
        .subcont{
            width:100%;
            margin:0;
            margin-top:5%;
        }
        .topnavbar{padding-left:0;}
    }
    </style>
</head>
<body>
    <div class="background-img">
        <nav class="topnavbar">
            <a href="home-page.php" class="lls"><img src="Logo-PixTeller.png" alt="logo" width="220px" height="60px"></a>
            <?php if(isset($_SESSION['USER'])){ ?>
                <a href="logout.php?logout"><button class="logout abtn">Logout</button></a>
            <?php } ?>
        </nav>

        <div class="subcont">
        <form action="process-transfer.php?process=T-R-A-N-S-F-E-R" method="post">
  <div class="imgcontainer">
    <h2>Transfer Funds</h2>
  </div>

  <div class="container">
    <label for="tocustomer"><b>To</b></label>
    <input type="number" placeholder="Enter Account number" name="tocustomer" required><br>
                <br>
    <label for="amount"><b>Amount</b></label>
    <input type="number" placeholder="Enter Amount" name="amount" required><br>
    <br>
    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
        <br><br>
    <button type="submit">PROCEED</button>
    <br><br>
  </div>
        </div>

    </div>
</body>
</html>

<?php } else {header("location:home-page.php");}?>
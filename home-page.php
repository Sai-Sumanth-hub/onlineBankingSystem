<?php 
session_start();
require_once "connect_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whale Bank</title>

    <link rel="stylesheet" href="common-style.css">
    <link rel="stylesheet" href="home-style.css">
    

    <style>
        @import url('https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap');
    .dialog {
        width: 100%;
        height: 100%;
        position: fixed;top: 0;left: 0;
        z-index: 4;
        background-color: rgba(0,0,0,0.6);
    }
    .idialog,.idiag {
        border-radius: 6px;
        border: 1px solid transparent;
    }
    .idialog {
        width: 30%;       
        padding: 5px;
        background-color: royalblue;
        margin-left: 35%;
        margin-top: 10%;
    }
    .idiag {
        background-color: white;
    }
    .idiag > h2,.idiag > p {
        text-align: center;
    }
    .idiag > p > a > button {
        width: 80px;
        height: 4vh;
    }
    .signin {
        right: 2%;
    }
    .log {
        right:11%
    }

    table {
        width: 50%;
        height: 100%;
        border-collapse: collapse;
        font-size:1.3vw;
        transition:all 0.2s;
    }
    th {
        padding-bottom:1%;
    }
    td {
        text-align: center;
        padding: 0% 0;
        font-weight: ;
    }
    .upar {
        position: absolute;
        top: -30px;
        font-size: 50px;
        right: 10px;
        color: black;
        
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
    .nls {
        font-family: 'Encode Sans Condensed', sans-serif;
        
        width: 7%;
        margin-right: 1%;
        text-align: center;
        font-size: 1.25vw;
        padding: 1% 0;
    }
    a {
        text-decoration: none;
        color: white;
    }
    .nls:hover {
        border-bottom: 3px solid wheat;
        color:wheat;
    }

    .sub-cont {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    #heading {
        font-size: 60px;
        font-family: 'PT Sans', sans-serif;
        display: inline-block;
        color: white;
    }
    .ls-cont {
        border: 1px  ;
        width: 60%;
    }
    .btn {
        width: 30%;
        padding: 1.5% 0;
        font-size: 1.2vw;
        cursor: pointer;
        border: none;
        border: 2px solid rgba(250,250,250,0.1);
        border-radius: 5px;
        font-weight: bold;
        color: rgba(250,250,250,0.7);
    }
    .l-btn:hover {
        border: 2px solid limegreen;
        background-color: transparent;
        color: limegreen;
    }
    .s-btn:hover {
        border: 2px solid  rgba(90, 184, 218 ,1);
        background-color: transparent;
        color: rgba(98, 199, 235 ,1);
    }
    footer {
        background-color: rgb(29, 48, 48);
        position: absolute;
        padding: 0.5%;
        bottom: 0;
        width: 100%;
        color: royalblue;
    }
    .l-btn {
        background-color: rgba(0, 134, 36 ,1);
        margin-top:2.8%
    }
    .s-btn {
        background-color: rgba(79, 162, 192 ,1);
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
    .addcust {
        position:absolute;
        right:10%;
        top:16px;
        width:10%;
        font-size:1.2vw;
        height:6vh;
        cursor:pointer;
        border:none;
        border-radius:6px;
        background-color:rgba(255, 108, 54,0.8);
        color:white;
    }
    .muser {
        position:absolute;
        right:22%;
        top:17px;
        width:12%;
        font-size:1.2vw;
        height:6vh;
        cursor:pointer;
        border:none;
        border-radius:6px;
        background-color:rgba(255, 54, 121 ,0.8);
        color:white;
    }
    .fitt {
        z-index:8;
        width:60%;
        <?php if ($_SESSION['EID'] == "admin@gmail.com") {?>
            margin-top:5%;
        <?php } else { ?>
            margin-top:3%;
        <?php } ?>
        margin-left:20%;
        background-color:rgba(0,0,0,0.2);
        color:white;
        display:flex;
        justify-content:center;
    }
    table {width:72%;}
    .welcome {
        font-size:3vw;
        padding: 0 6% 2% 6%;
    }

    .bbtns {
        width:50%;
        height:5vh;
        cursor:pointer;
        font-family: 'PT Sans', sans-serif;
        font-size:1.2vw;
        background-color:transparent;
        color:white;
        border:1px solid white;
    }
    .bbtns:hover {
        background-color:white;
        border:none;
        color:black;
    }


    .overlay {
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        background:rgba(0,0,0,0.8);
        z-index:6;
    }
    .ol1 {
        
        padding:0.5%;
        background:royalblue;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .ol2 {
        padding:4%;
        background:white;
    }

    @media screen and (max-width:600px){
        .btn{
            width:40%;
            font-size:14px;
        }
        .logout {
            font-size:12px;
        }
        #cr {
            font-size:11px;
        }
        .fitt {
            margin-left:0;
            width:100%;
            
        }
        table {
            font-size:18px;
        }
        .abtn {
            font-size:9px;
        }
        .topnavbar{padding-left:0;}
        .nls {display:none;}
    }
    
    </style>

</head>
<body>


    <div class="background-img">
        <nav class="topnavbar">
            <a href="home-page.php" class="lls"><img src="Logo-PixTeller.png" alt="logo" width="220px" height="60px"></a>
            <a href="w-contact.php" class="nls"><span >Contact</span></a>
            <a href="w-aboutus.php" class="nls"><span >About us</span></a>
            <a href="w-newsletter.php" class="nls"><span >News Letter</span></a>

            <?php if(isset($_SESSION['USER'])){ ?>
                <?php if ($_SESSION['EID'] == "admin@gmail.com") { ?>
                    <a href="register-page.php?admin_request"><button class="addcust abtn">Add Customer</button></a>
                <?php } ?>
                <a href="logout.php?logout"><button class="logout abtn">Logout</button></a>
            <?php } ?>
        </nav>

        <?php if(!isset($_SESSION['USER'])) { ?>
        <div class="sub-cont">
            
            <img src="iimage.png" alt="" width="300px" height="150px" style="opacity:0.4;user-select:none;margin-top:4%">
            
            <div class="ls-cont">
                <h1 style="text-align: center;color: white;">Your Bank at your Finger tips</h1>
                <h4 style="text-align: center; color: white;">Login into your account or Create an account to manage your transactions, payments, and account without going to bank.</h4>
                
                <p style="text-align: center;"><a href="loginpage.php"> <button class="btn l-btn">LOGIN</button></a></p>
                <p style="text-align: center;"><a href="register-page.php"> <button class="btn s-btn">CREATE</button></a></p>
            </div>
        </div>
        <?php } ?>


        <footer>
            <p id='cr'>Copy Right &nbsp;     <i class="fas fa-copyright"></i> &nbsp; Whale Bank. All Rights Reserved | Contact number : +91 80000 00000</p>
        </footer>

        <?php if (isset($_SESSION['USER'])) { ?>

            <?php if (isset($_GET['msg']) and isset($_GET['emsg'])) { ?>
                <div class="overlay">
                    <div class="ol1">
                        <div class="ol2">
                            <?php if ($_GET['msg'] != null or $_GET['msg'] != "") { ?>
                                <h1 style="color:green; text-align:center;"><?php echo$_GET['msg'];?></h1>
                            <?php } elseif ($_GET['emsg'] != null or $_GET['emsg'] != "") { ?>
                                <h1 style="color:red; text-align:center;"><?php echo$_GET['emsg'];?></h1>
                            <?php } ?>
                            <p style='text-align:center;'><a href="home-page.php"><button style="width:100px;">OK</button></a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        
        
        <div class="fitt">
            <?php 
                $sql = "SELECT acc_balance FROM customers WHERE acc_number=".$_SESSION['ACCT'];
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();
            ?>
        <table>
            <tr>
                <th>
                    <span class="welcome">Welcome <?php echo $_SESSION['USER']; ?> !</span><br>
                    <span style='font-size:1.8vw'>AC/NO: <?php echo $_SESSION['ACCT']; ?></span><hr>
                </th>
            </tr>
            <tr>
                <td style="padding-top:4%;">
                    <span><span style="font-size:1.8vw;">Balance:</span>&nbsp;     <span style="font-size:2.4vw;font-family: 'Barlow Condensed', sans-serif;">₹ <?php echo $data['acc_balance'];?></span></span><br>
                    
                </td>
            </tr>
            <tr>
                <td style="padding-top:3%;">
                

                </td>
            </tr>
            <tr>
                <td style="padding-top:3%;">
                    <p><a href="w-profilepage.php"><button class='bbtns'>View Profile</button></a></p>
                </td>
            </tr>
            <?php if ($_SESSION['EID'] != "admin@gmail.com") { ?>
            <tr>
                <td>
                    <p><a href="w-mytransactions.php"><button class='bbtns'>My Transactions</button></a></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><a href="w-transferfunds.php"><button class='bbtns'>Transfer Funds</button></a></p>
                </td>
            </tr>
            <?php } ?>

        </table>
        </div>
        <?php } ?>

    </div>


  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/958d8aa796.js" crossorigin="anonymous"></script>


    <script src="home-script.js"></script>
    
</body>
</html>
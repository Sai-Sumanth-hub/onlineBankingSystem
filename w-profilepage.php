<?php
session_start();
if (isset($_SESSION['ACCT'])) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whale Bank</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Open+Sans+Condensed:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            margin:0; padding:0;
            background-color:black;
            font-family: 'Open Sans Condensed', sans-serif;
            font-family: 'Roboto', sans-serif;
        }
        .cont{
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('home.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width:100vw;
            height:100vh;
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
    .subcont {
        width:30%;
        margin:0.3% 35%;
        background-color:white;
    }
    table{
        width:100%;
        height:100%;
        border-collapse:collapse;
        
    }
    th{
        padding:3% 0;
        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('pback.jfif');
        user-select:none;
    }
    th img {
        opacity:0.8;
    }
    td {
        padding:2%;
        font-weight:bold;
        font-size:1.3vw;
        text-align:center;
        border-bottom:1px groove rgba(0,0,0,0.5);
    }
    .edit {
        font-size:1.2vw;
        width:40%;
        height:5vh;
        user-select:none;
    }

    @media screen and (max-width:800px) {
        .topnavbar{padding-left:0;}
        .abtn {
            font-size:9px;
        }
        .subcont {margin: 0;width:100%}
        td {font-size:14px;}
        #mp {
            font-size:20px;
        }
    }
    </style>
</head>
<body>

    <div class="cont">
        <nav class="topnavbar">
            <a href="home-page.php" class="lls"><img src="Logo-PixTeller.png" alt="logo" width="220px" height="60px"></a>
            <?php if ($_SESSION['EID'] == "admin@gmail.com") { ?>
                
                <a href="register-page.php?admin_request"><button class="addcust abtn">Add Customer</button></a>
            <?php } ?>
            <a href="logout.php?logout"><button class="logout abtn">Logout</button></a>
        </nav>


        <div class="subcont">
            <table>
                <tr>
                    <th>
                        <img src="profile.jpg" alt="" width="200px" height="200px">
                    </th>
                </tr>
                <tr>
                    <td>
                        Full Name : <?php echo $_SESSION['USER']; ?>
                    </td> 
                </tr>
                <tr>
                    <td>
                        Email ID : <?php echo $_SESSION['EID']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone No. : <?php echo $_SESSION['PHN']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address : <?php echo $_SESSION['LOC']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Date of Birth : <?php echo $_SESSION['DOB']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password : <?php echo $_SESSION['PWD']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="w-edit-details.php"><button class="edit">Edit Details</button></a>
                    </td>
                </tr>
            </table>
        </div>


    </div>
    
</body>
</html>

<?php } else { header("location:home-page.php");} ?>
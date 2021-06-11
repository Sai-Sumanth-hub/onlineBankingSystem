<?php
session_start();
require_once "connect_db.php";

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
        width:80%;
        margin:5% 10%;
        background-color:white;
        max-height:60vh;
    }
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width:100%;
    
    overflow-y:scroll;
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}


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
        <table class="styled-table">
            <thead>
            <tr>
                <th>From Account number</th>
                <th>To Account number</th>
                <th>Amount Transfered</th>
                <th>Date &amp; Time</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * FROM transaction_rec WHERE from_acc_num = ".$_SESSION['ACCT'];

                $result = $conn->query($sql);
                
                if (isset($result) and $result->num_rows > 0){
                    while ($data = $result->fetch_assoc()) {
                        echo "<tr><td>".$data['from_acc_num']."</td>
                        <td>".$data['to_acc_num']."</td>
                        <td>".$data['amt_transfered']."</td>
                        <td>".$data['dandt']."</td>
                        <td>".$data['trans_status']."</td></tr>";
                    }
                }
            ?>
        
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>

<?php } else {header("location:home-page.php");}?>
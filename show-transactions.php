<?php
session_start();
require_once "connect_db.php";
if (isset($_SESSION['ACCT'])) {
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Transfer</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="common-style.css">

    <style>
        ::-webkit-scrollbar {
    width: 5px;
}
        body {
            margin:0;
            padding: 0;
            font-family: 'Nunito Sans', sans-serif;
            background-color: rgba(0,0,0,0.86);
        }
        .container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .subcont {
            font-family: 'Nunito Sans', sans-serif;
            width: 80%;
            height: 75vh;
            overflow-y: scroll;
            border: 1px solid rgba(250,250,250,0.36);
        }
        table {
            width: 100%;
            border: 1px solid grey;
            border-collapse: collapse;
        }
        td,th {
            border:1px solid grey;
            color: white;
            opacity: 0.7;
            font-size: 3vh;
        }
        th {
            color: antiquewhite;
        }
        tr:hover {
            background-color: rgba(0,0,0,0.36);
        }
        td {
            text-align: center;
        }
        #heading {
            color:royalblue;
            opacity: 0.7;
        }
    </style>

</head>
<body>

    <a href="home-page.php"><img src="Logo-PixTeller2.png" alt="logo" class="logo"></a>

    <div class="container">
        <h1 id="heading">Transaction History</h1>
        <div class="subcont">
            <table>
                <tr>
                    <th>S.No.</th>
                    <th>From (Act. number)</th>
                    <th>To (Act. number)</th>
                    <th>Amount (in ₹)</th>
                    <th>Status</th>
                </tr>
                <?php

                $sql = "SELECT * FROM transaction_rec";
                $result = $conn->query($sql);

                if (($result->num_rows) > 0) {
                    while ($data = $result->fetch_assoc()) {
                        $c = '';
                        if ($data['trans_status'] == 'FAILED') {$c = "rgba(255, 39, 88,0.7)";}
                        else {$c = "rgba(39, 255, 107,0.6)";}
                        echo "<tr>
                        <td>".$data['trans_id']."</td>
                        <td>".$data['from_acc_num']."</td>
                        <td>".$data['to_acc_num']."</td>
                        <td>".$data['amt_transfered']."</td>
                        <td style='color:".$c."'>".$data['trans_status']."</td>
                    </tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>
<?php }else{ echo "Please <a href='loginpage.php'><b>Login</b></a> to view this page.";}?>
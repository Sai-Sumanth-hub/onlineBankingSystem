<?php
session_start();
if (!isset($_SESSION['ACCT'])) { 
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
            background-color: rgba(250,250,250,1);
        }
        .sign {
            width: 70%;
            margin-left: 15%;
        }
        table {
            width: 100%;
        }
        .ttle {
            display: inline;
        }
        .txt {
            color: grey;
        }
        td {
            padding: 2%;
        }
        th {
            border-bottom: 1px groove rgba(0,0,0,0.2);
            padding-bottom: 2%;
        }
        input{
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            width: 100%;
            height: 6vh;
            border: 1px solid grey;
            background-color: rgba(0,0,0,0.03);
            font-size: 2.7vh;
            border: 1px solid rgba(0,0,0,0.15);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .firs {
            padding-top: 4%;
        }
        input[type='submit'] {
            width: 8vw;
            height: 5vh;
            cursor: pointer;
            color: black;
            font-size: 2.3vh;
            border: 1px solid rgba(35, 164, 255 ,0.8);
            font-family: 'Gill Sans',sans-serif;
            background-color: rgba(35, 164, 255 ,0.3);
            opacity: 0.9;
            box-shadow: none;
        }
        #goto2 {
            color: rgb(35, 164, 255,0.8);
            text-decoration: none;
        }
        .backh{
            position:absolute;
            left:20%;
            padding:0.6% 0.7%;
            margin:1%;
            border:1px solid black;
            border-radius:50%;
            color:black;
        }
        

        @media screen and (max-width: 900px){
            .signcont {
                width: 100%;
            }
            .sign {
                width: 100%;
                margin: 0;
            }
            input[type='submit'] {
                width: 100px;
            }
            .backh{
                left:0;
            }
        }
    </style>
</head>
<body>

    <div class="cont">
        <div class="signcont">
            <form class="sign" id="switch2" action="process-transfer.php?process=L-O-G-I-N" method="POST">
            <a href="home-page.php" class="backh" title="Go to Home"><i class="fas fa-arrow-left"></i></a>
                <table>
                    <tr>
                        <th><span id="mmm" style='color:red'><?php if(isset($_GET['mesg'])){echo $_GET['mesg'];} ?></span><br><h1 class="ttle">Login</h1><br><span class="txt">Please fill in this form to login!</span></th>
                    </tr>
                    <tr>
                        <td class="firs">
                            <p><b>Enter your Email ID: </b></p>
                            <input type="email" onfocus="r_it();" name="vemail" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter your Password:</b></p>
                            <input type="password" onfocus="r_it();" name="vpwd"
                            minlength="5" maxlength="25" required>
                        </td>
                    </tr>
                    <tr>
                        <th><br>
                            <input id="ss2" type="submit" value="Login" name="lsubmit">
                        </th>
                    </tr>
                    <tr>
                        <td>Don't have an Account? <a href="register-page.php" id="goto2"><b>Click here</b></a></td>
                    </tr>
                </table>
            </form>
        </div>
        
    </div>

    <datalist id="acc-numbers">
        <option value="11111100"></option>
        <option value="11111200"></option>
        <option value="11111300"></option>
        <option value="11111400"></option>
        <option value="11111500"></option>
        <option value="11111600"></option>
        <option value="11111700"></option>
        <option value="11111800"></option>
        <option value="11111900"></option>
        <option value="111111010"></option>
    </datalist>

    <script>
        function r_it() {
            document.getElementById("mmm").innerHTML = "";
        }
    </script>
    <script src="https://kit.fontawesome.com/958d8aa796.js" crossorigin="anonymous"></script>

</body>
</html>
<?php } else {header("location:home-page.php");}?>
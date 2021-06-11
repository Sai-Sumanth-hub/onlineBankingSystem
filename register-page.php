<?php
session_start();
if ($_SESSION['EID'] == 'admin@gmail.com' or !isset($_SESSION['ACCT'])) {
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
            position: absolute;
            top:20px;
            font-family: 'Nunito Sans', sans-serif;
            box-shadow: 0 0 15px black;
            background-color: rgba(250,250,250,1);
            height:93vh;
            overflow-y:scroll;
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
        input[type='checkbox'],input[type='submit'],input[type='text'],input[type='number'],input[type='date'],input[type='password'],input[type='email']{
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            width: 100%;
            height: 6vh;
            border: 1px solid grey;
            background-color: rgba(0,0,0,0.01);
            font-size: 2.7vh;
            border: 1px solid rgba(0,0,0,0.15);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input[type='checkbox'] {
            width: 12;
            height: 12;
            box-shadow: 0 0 1px grey;
        }
        .firs {
            padding-top: 4%;
        }
        input[type='submit'],input[type='reset'] {
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
        #goto {
            color: rgb(35, 164, 255,0.8);
            text-decoration: none;
        }
        #switch1 {
            transition: 0.4s;
        }
        #i1,#i2,#i3,#i4,#i5 {
            display: none;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: red;
        }
        .depo {
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }
        textarea {
            resize:none;
            background-color: rgba(0,0,0,0.01);
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2.4vh;
            border: 1px solid rgba(0,0,0,0.15);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        p {
            opacity:0.8;
        }
        input[type='reset'] {
            background-color:rgba(10,200,20,0.5);
            border: 1px solid rgba(10,200,20,0.8);
        }
        .backh{
            position:absolute;
            left:0;
            padding:1%;
            margin:1%;
            border:1px solid black;
            border-radius:50%;
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
            <form class="sign" id="switch1" action="process-transfer.php?process=R-E-G-I-S-T-E-R" method="POST">
                <a href="home-page.php" class="backh" title="Go to Home"><i class="fas fa-arrow-left"></i></a>
                <table>
                    <tr>
                        <th><h1 class="ttle"><?php if (isset($_GET['admin_request'])) { echo"Add Customer";}else{echo"Sign-Up";}?></h1><br><span class="txt">Please fill in this form to create an account!</span></th>
                    </tr>
                    <tr>
                        <td class="firs">
                            <p><b>Enter Full name of Customer: </b></p>
                            <input type="text" name="uname" required>
                            <br><small id="i1">The name is not valid</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter Date of Birth: </b></p>
                            <input type="date" name="dob" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter Email ID: </b></p>
                            <input type="email" name="uemail"  required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter Permanent Address:</b></p>
                            <textarea name="uloc" cols="66" rows="6" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter Phone Number: </b></p>
                            <input id="phn" type="number" name="phn"
                            minlength="10" maxlength="10" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Select Gender: </b></p>
                            <input type="radio" name="gender" value="Male" required> Male
                            <input type="radio" name="gender" value="Female" required> Female
                            <input type="radio" name="gender" value="Other" required> Other
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter Password: </b></p>
                            <input id="ppp" type="password" name="upwd"
                            minlength="5" maxlength="25" required onblur="see_cpwd();">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Re-Enter Password: </b></p>
                            <input id="ccc" type="password" name="ucpwd" onblur="check_pwd();" onfocus="document.getElementById('i5').style.display='none';" 
                            minlength="5" maxlength="25" required >
                            <br><small id="i5">The Passwords do not Match!</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter Opening Balance: </b></p>
                            <input class="depo" type="number" name="ubal" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Enter PIN(4 digit): </b></p>
                            <input type="number" name='pin' length="4" required>
                        </td>
                    </tr>
                    <?php if (!isset($_GET['admin_request'])){ ?>
                    <tr>
                        <td><p><input type="checkbox" required>
                            <b> I Agree to the <span>Terms</span> and <span>Conditions.</span></b></p>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th><br>
                            <input id="ss1" type="submit" value="Submit" name="submit">
                            <input type="reset" value="Reset">
                        </th>
                    </tr>
                    <?php if (!isset($_GET['admin_request'])){ ?>
                    <tr>
                        <td>
                            <p><b>Already have an Account? <a href="loginpage.php" style="color:royalblue;">Click here</a></b></p>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        
    </div>



    <script>
        function see_cpwd() {
            
        }

        function check_pwd() {
            var a = document.getElementById("ppp");
            var b = document.getElementById("ccc");
            if (a.value != b.value) {
                document.getElementById("i5").style.display='inline';
            }
        }

    </script>
    <script src="https://kit.fontawesome.com/958d8aa796.js" crossorigin="anonymous"></script>
</body>
</html>
<?php } else {header("location:home-page.php");}?>
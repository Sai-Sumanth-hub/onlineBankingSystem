<?php
session_start();
if (isset($_SESSION['USER'])) {
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Whale Bank</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type='checkbox'],input[type='text'],input[type='number'],input[type='date'],input[type='password'],input[type='email'] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  font-size:1.2vw;
}

input:focus {
  background-color: #ddd;
  outline: none;
}


/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn,.cancel {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  font-size:20px;
}
.cancel {
    background-color:tomato;
}

.registerbtn:hover,.cancel:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

@media screen and (max-width:700px) {
    input[type='checkbox'],input[type='text'],input[type='number'],input[type='date'],input[type='password'],input[type='email'] {
        font-size:15px;
    }
}
</style>
</head>
<body>

<form action="process-transfer.php?process=E-D-I-T" method='post'>
  <div class="container">
    <h1>EDIT</h1>
    <p>Please Edit your details to update your account.</p>
    <hr>

    <label for="user"><b>Full Name:</b></label>
    <input type="text" name="user" id="email" required value="<?php echo $_SESSION['USER'];?>">

    <label for="email"><b>Email</b></label>
    <input type="email"  name="email" id="email" required value="<?php echo $_SESSION['EID'];?>">

    <label for="loc"><b>Address:</b></label>
    <input type="text" name="loc" id="email" required value="<?php echo $_SESSION['LOC'];?>">

    <label for="phn"><b>Phone No.:</b></label>
    <input type="number" name="phn" id="email" required value="<?php echo $_SESSION['PHN'];?>">

    <label for="dob"><b>Date of Birth:</b></label>
    <input type="date" name="dob" id="email" required value="<?php echo $_SESSION['DOB'];?>">

    <?php if($_SESSION['EID'] == 'admin@gmail.com') { ?>
    <label for="pin"><b>PIN (4 digits):</b></label>
    <input type="number" name="pin" id="email" required value="<?php echo $_SESSION['PIN'];?>">
    <?php }?>

    <p><b>Select Gender:</b></p>
    <input type="radio" required name="gender" value="Male"> Male
    <input type="radio" required name="gender" value="Female"> Female
    <input type="radio" required name="gender" value="Other"> Other <br><br><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" name="psw" id="psw" required value="<?php echo $_SESSION['PWD'];?>">

    <hr>
    

    <input type="submit" class="registerbtn" value="UPDATE">
    <a href="w-profilepage.php"><button class="cancel">CANCEL</button></a>
  </div>
  
</form>

</body>
</html>


<?php } else { header("location:home-page.php");} ?>
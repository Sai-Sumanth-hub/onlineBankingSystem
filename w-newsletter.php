<?php 
session_start();
?>

<!DOCTYPE html>
<html>
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

form {
  border: 3px solid #f1f1f1;
  font-family: Arial;
}

.container {
  padding: 20px;
  background-color: #f1f1f1;
}

input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size:1.5vw;
}

input[type=checkbox] {
  margin-top: 16px;
}

input[type=submit] {
  background-color: royalblue;
  color: white;
  border: none;
  cursor:pointer;
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

input[type=submit]:hover {
  opacity: 0.8;
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
<body>
<div class="background-img">
<nav class="topnavbar">
            <a href="home-page.php" class="lls"><img src="Logo-PixTeller.png" alt="logo" width="220px" height="60px"></a>
            <?php if(isset($_SESSION['USER'])){ ?>
                <a href="logout.php?logout"><button class="logout abtn">Logout</button></a>
            <?php } ?>
        </nav>

        <h2 style="color:white;opacity:0.8;text-align:center;">Newsletter</h2>

<form action="">
  <div class="container">
    <h2>Subscribe to our Newsletter</h2>
    <p>Enter your name and Email ID to get updates and news regarding our bank. We will daily send you the useful information if you check the 'Daily Newsletter'.</p>
  </div>

  <div class="container" style="background-color:white">
    <input type="text" placeholder="Name" name="name" required>
    <input type="text" placeholder="Email address" name="mail" required>
    <label>
      <input type="checkbox" checked="checked" name="subscribe"> Daily Newsletter
    </label>
  </div>

  <div class="container">
    <input type="submit" value="Subscribe">
  </div>
</form>
</div>




</body>
</html>

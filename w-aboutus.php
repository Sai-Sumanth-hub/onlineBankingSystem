<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            padding:0;
            margin:0;
            font-family: 'Roboto', sans-serif;
            background-color: rgb(29, 48, 48);
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

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
  
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding:1%;
  margin: 8px;
  background:white;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
  background-color: #0086CF;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: royalblue;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
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

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
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

<div class="about-section">
  <h1>About Us</h1>
  <p>We believe in Trust more than Anything in this world</p>
  <p>We will always be there to make sure there is nothing wrong in the services provided by us, Now and in Future too.</p>
</div>

<h2 style="text-align:center;color:white;">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      
      <div class="container">
        <h2>Jack Sparrow</h2>
        <p class="title">CEO & Founder</p>
        <p>Success does not have fullstops, success only has comma's.</p>
        <p>Sparrow@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      
      <div class="container">
        <h2>John Wick</h2>
        <p class="title">Art Director</p>
        <p>I am a man of committment, focus and shear Will.</p>
        <p>John@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      
      <div class="container">
        <h2>Max Blake</h2>
        <p class="title">Designer</p>
        <p>Believe in yourself, Be who you want to be.</p>
        <p>Max@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

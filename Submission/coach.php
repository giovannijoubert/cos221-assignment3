<?php
   include_once('login.php'); // Includes Login Script
   if(! isset($_SESSION['login_user'])){
   header("location: index.php");
   }
   if( $_SESSION['coach'] == "N"){
   header("location: fans.php");
   }
   include('insert.php');
   $_POST['insert_action'] = "";
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Coach | NFLStats - The Premiere Stats Site
      </title>
      <meta name="author" content="Giovanni Joubert">
      <meta name="description" content="The Premiere Movie Database">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/main.css" type="text/css">
      <link rel="icon" href="img/favico.png" type="image/png">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
   </head>
   <body onload="loadData()">
      <header>
         <nav>
            <ul class="topNav">
               <img alt="NFLStats Logo" class="topLogo" src="img/mainlogo.svg">
               <li>
                  <a href="logout.php">
                  <i class="fa fa-sign-out-alt">
                  </i>Logout
                  </a>
               </li>
               <li>
                  <a href="fans.php">
                  <i class="fa fa-user-friends">
                  </i>Fans  &amp; Players Dashboard
                  </a>
               </li>
               <li>
                  <a class="activeNav"  href="coach.php">
                  <i class="fa fa-football-ball">
                  </i>Coach Dashboard
                  </a>
               </li>
            </ul>
         </nav>
         <svg class="custom-header-shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="white" points="0,100 100,0 100,100"/>
         </svg>
         <div class="welcome-msg">
            <h1>Welcome
            </h1>
            <h3>to The Premiere NFL Dashboard
            </h3>
         </div>
      </header>
      <div id="content-container">
         <div class="pageNav">
            <ul class="topNav coachNav" >
               <li>
                  <a id="addUserbtn" class ="activeNav">
                  <i class="fa fa-users">
                  </i>Add User
                  </a>
               </li>
               <li>
                  <a id="addPlayerbtn">
                  <i class="fa fa-male">
                  </i>Add Player
                  </a>
               </li>
               <li>
                  <a id="addGamebtn">
                  <i class="fa fa-trophy">
                  </i>Add Game
                  </a>
               </li>
               <li>
                  <a  id="addStatbtn" >
                  <i class="fa fa-chart-bar">
                  </i>Add Statistic
                  </a>
               </li>
            </ul>
            <ul class="topNav coachNav" >
               <li>
                  <a  id="modUserbtn">
                  <i class="fa fa-users-cog">
                  </i>Modify User
                  </a>
               </li>
               <li>
                  <a id="modPlayerbtn"  >
                  <i class="fa fa-user-check">
                  </i>Modify Player
                  </a>
               </li>
               <li>
                  <a id="modStatbtn"  >
                  <i class="fa fa-chart-pie">
                  </i>Modify Statistic
                  </a>
               </li>
            </ul>
         </div>
         <div id="addUser" style="margin-top:70px;" class="insert_form">
            <form action="" method="post">
               <h2>Add User to Database
               </h2>
               <div class="form-group">
                  <label for="cUsername">Username:
                  </label>
                  <input type="text" class="form-control" name="cUsername" id="cUsername1" required="true">
               </div>
               <div class="form-group">
                  <label for="cPassword">Password:
                  </label>
                  <input type="password" class="form-control" name="cPassword" id="cPassword1" required="true">
               </div>
               <div class="form-group">
                  <label for="coach">Is this User a Coach?
                  </label>
                  <select class="form-control" id="coach1" name="coach" style="width:200px;" required="true">
                     <option value="Y">Yes
                     </option>
                     <option value="N">No
                     </option>
                  </select>
               </div>
               <input type="hidden" name="insert_action" value="insuser">
               <input type="submit" name="btntype" style="margin-top:15px;" class="btn btn-default" value="Add">
               <div class="responsemsg" style="padding-top:10px; font-style:italic;">
                  <?php echo $error; ?>
               </div>
            </form>
         </div>
     
      <div  id="addPlayer" class="insert_form">
         <h2>Add Player to Database
         </h2>
         <form action="" method="post">
            <div class="form-group">
               <label for="fName">First Name:
               </label>
               <input type="text" class="form-control" name="fName" id="fName" required="true">
            </div>
            <div class="form-group">
               <label for="lName">Last Name:
               </label>
               <input type="text" class="form-control" name="lName" id="lName" required="true">
            </div>
            <div class="form-group">
               <label for="birthDate">Birth Date:
               </label>
               <input type="date" class="form-control" name="birthDate" id="birthDate" required="true">
            </div>
            <div class="form-group">
               <label for="pPos">Playing Position:
               </label>
               <select class="form-control" id="pPos" name="pPos" style="width:200px;" required="true">
                  <option value="QB">Quarterback
                  </option>
                  <option value="RB">Running Back
                  </option>
                  <option value="FB">Fullback
                  </option>
                  <option value="WR">Wide Receiver
                  </option>
                  <option value="OL">Offensive Lineman
                  </option>
                  <option value="C">Center
                  </option>
                  <option value="G">Guard
                  </option>
                  <option value="T">Tackle
                  </option>
                  <option value="K">Kicker
                  </option>
                  <option value="LB">Linebacker
                  </option>
                  <option value="CB">Cornerback
                  </option>
                  <option value="DB">	Defensive Back
                  </option>
               </select>
            </div>
            <div class="form-group">
               <label for="pTeam">Team Name:
               </label>
               <input type="text" class="form-control" name="pTeam" id="pTeam" required="true">
            </div>
            <div class="form-inline">
               <label for="pHeight">Height (meters):
               </label>
               <input type="number"  step=".1" style="width:140px;" class="form-control" name="pHeight" id="pHeight" required="true">
               <label for="pWeight" style="margin-top:5px">Weight (KG):
               </label>
               <input type="number" step=".1" style="width:140px;" class="form-control" name="pWeight" id="pWeight" required="true">
            </div>
            <input type="hidden" name="insert_action" value="player">
            <input type="submit" name="btntype" style="margin-top:15px;" class="btn btn-default" value="Add">
            <div class="responsemsg" style="padding-top:10px; font-style:italic;">
               <?php echo $error; ?>
            </div>
         </form>
      </div>
      <div id="addGame" class="insert_form">
         <h2>Add Game to Database
         </h2>
         <form action="" method="post">
            <div class="form-group">
               <label for="gDate">Date:
               </label>
               <input type="date" class="form-control" name="gDate" id="gDate" required="true">
            </div>
            <div class="form-group">
               <label for="gLocation">Location:
               </label>
               <input type="text" class="form-control" name="gLocation" id="gLocation" required="true">
            </div>
            <div class="form-group">
               <label for="gTeamHome">Home Team:
               </label>
               <select class="form-control" id="gTeamHome" name="gTeamHome" style="width:200px;" required="true">
               </select>
            </div>
            <div class="form-group">
               <label for="gTeamAway">Visiting Team:
               </label>
               <select class="form-control" id="gTeamAway" name="gTeamAway" style="width:200px;" required="true">
               </select>
            </div>
            <input type="hidden" name="insert_action" value="game">
            <input type="submit"  name="btntype" style="margin-top:15px;" class="btn btn-default" value="Add">
            <div class="responsemsg" style="padding-top:10px; font-style:italic;">
               <?php echo $error; ?>
            </div>
         </form>
      </div>
      <div id="addStat" class="insert_form">
         <h2>Add Statistic to Database
         </h2>
         <form action="" method="post">
            <div class="form-group">
               <label for="Players">Player:
               </label>
               <select class="form-control" id="Players" name="Players"  required="true">
               </select>
            </div>
            <div class="form-group">
               <label for="Games">Game:
               </label>
               <select class="form-control" id="Games" name="Games"  required="true">
               </select>
            </div>
            <div class="form-group">
               <label for="statName">Stat Type:
               </label>
               <select class="form-control" id="statName" name="statName"  required="true">
                  <option disabled style="font-weight:700">Offensive
                  </option>
                  <option value="Passing Attempts">Passing Attempts
                  </option>
                  <option value="Complete Passes">Complete Passes
                  </option>
                  <option value="Passing Yards">Passing Yards
                  </option>
                  <option vale="Interceptions">Interceptions
                  </option>
                  <option value="Rushing Yards">Rushing Yards
                  </option>
                  <option value="Receiving Yards">Receiving Yards
                  </option>
                  <option value="Receptions">Receptions
                  </option>
                  <option value="Touchdowns">Touchdowns
                  </option>
                  <option value="Fumbles">Fumbles
                  </option>
                  <option value="Field Goals Attempted">Field Goals Attempted
                  </option>
                  <option value="Field Goals Made">Field Goals Made
                  </option>
                  <option disabled style="font-weight:700">Defensive
                  </option>
                  <option value="Tackles">Tackles
                  </option>
                  <option value="InterceptionsD">Interceptions
                  </option>
                  <option value="Sacks">Sacks
                  </option>
               </select>
            </div>
            <div class="form-group">
               <label for="statValue">Value:
               </label>
               <input type="number" step="0.1" class="form-control" name="statValue" style="width:200px;" id="statValue" required="true">
            </div>
            <input type="hidden" name="insert_action" value="stat">
            <input type="submit"  name="btntype" style="margin-top:15px;" class="btn btn-default" value="Add">
            <div class="responsemsg" style="padding-top:10px; font-style:italic;">
               <?php echo $error; ?>
            </div>
         </form>
      </div>
         <div id="modUser"  class="insert_form">
            <form action="" method="post">
               <h2>Modify User in Database
               </h2>
              <div class="form-group">
               <label for="cUsername2">Select User:
               </label>
               <select class="form-control" id="cUsername2" name="cUsername" style="width:200px;" required="true">
               </select>
              </div>
               <div class="form-group">
                  <label for="cPassword">Password:
                  </label>
                  <input type="password" class="form-control" name="cPassword" id="cPassword">
               </div>
               <div class="form-group">
                  <label for="coach">Is this User a Coach?
                  </label>
                  <select class="form-control" id="coach" name="coach" style="width:200px;" required="true">
                     <option value="Y">Yes
                     </option>
                     <option value="N">No
                     </option>
                  </select>
               </div>
               <input type="hidden" name="insert_action" value="insuser">
               <input type="submit"  name="btntype"  style="margin-top:15px;" class="btn btn-default" value="Modify">
                <input type="submit" name="btntype" style="margin-top:15px;" class="btn-danger btn btn-default" value="Delete">
               <div class="responsemsg" style="padding-top:10px; font-style:italic;">
                  <?php echo $error; ?>
               </div>
            </form>
         </div>
       
       <div  id="modPlayer" class="insert_form">
         <h2>Modify Player in Database
         </h2>
         <form action="" method="post">
              <div class="form-group">
               <label for="playerID">Select Player:
               </label>
               <select class="form-control" id="playerID" name="playerID" style="width:200px;" required="true">
                         <option disabled selected>Select Player</option>
               </select>
                <div style="margin-top:10px" class="form-group">
               <label for="pPos">Playing Position:
               </label>
               <select class="form-control" id="pPos2" name="pPos" style="width:200px;" required="true">
                  <option value="QB">Quarterback
                  </option>
                  <option value="RB">Running Back
                  </option>
                  <option value="FB">Fullback
                  </option>
                  <option value="WR">Wide Receiver
                  </option>
                  <option value="OL">Offensive Lineman
                  </option>
                  <option value="C">Center
                  </option>
                  <option value="G">Guard
                  </option>
                  <option value="T">Tackle
                  </option>
                  <option value="K">Kicker
                  </option>
                  <option value="LB">Linebacker
                  </option>
                  <option value="CB">Cornerback
                  </option>
                  <option value="DB">	Defensive Back
                  </option>
               </select>
            </div>
            <div class="form-group">
               <label for="pTeam">Team Name:
               </label>
               <input type="text" class="form-control" name="pTeam" id="pTeam2" required="true">
            </div>
            <div class="form-inline">
               <label for="pHeight">Height (meters):
               </label>
               <input type="number"  step=".1" style="width:140px;" class="form-control" name="pHeight" id="pHeight2" required="true">
               <label for="pWeight" style="margin-top:5px">Weight (KG):
               </label>
               <input type="number" step=".1" style="width:140px;" class="form-control" name="pWeight" id="pWeight2" required="true">
            </div>
            <input type="hidden" name="insert_action" value="player">
            <input type="submit" name="btntype" style="margin-top:15px;" class="btn btn-default" value="Modify">
                  <input type="submit" name="btntype"  style="margin-top:15px;" class="btn btn-danger btn-default" value="Delete">
            <div class="responsemsg" style="padding-top:10px; font-style:italic;">
               <?php echo $error; ?>
                  </div></div>
    
           </form></div>
       
       
        <div id="modStat" class="insert_form">
         <h2>Modify Statistic in Database
         </h2>
                     <form action="" method="post">
        <div class="form-group">
               <label for="playerID">Select Player:
               </label>
               <select class="form-control" id="playerID2" name="playerID" style="width:200px;" required="true">
                   <option disabled selected>Select Player</option>
               </select>
            </div>
            
            <div class="form-group">
               <label for="stat">Select Stat:
               </label>
               <select class="form-control" id="stat" name="stat" style="width:400px;" required="true">
                   <option disabled selected>Select Statistic</option>
               </select>
            </div>
             
            
            <div class="form-group">
               <label for="statValue2">Value:
               </label>
               <input type="number" value="0" step="0.1" class="form-control" name="statValue" style="width:200px;" id="statValue2" required="true">
            </div>
            
            <input type="hidden" name="insert_action" value="stat">
            <input type="submit"  name="btntype" style="margin-top:15px;" class="btn btn-default" value="Modify">
            <input type="submit"  name="btntype" style="margin-top:15px;" class="btn-danger btn btn-default" value="Delete">
            <div class="responsemsg" style="padding-top:10px; font-style:italic;">
               <?php echo $error; ?>
            </div>

         </form>
      </div>
       </div>
       
       
      
      <script type="text/javascript" src="js/nfl.js"></script>
   </body>
</html>
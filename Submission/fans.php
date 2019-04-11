<?php
include('login.php'); // Includes Login Script

if(! isset($_SESSION['login_user'])){
header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Fans | NFLStats - The Premiere Stats Site</title>
      <meta name="author" content="Giovanni Joubert">
      <meta name="description" content="The Premiere Movie Database">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/main.css" type="text/css">
      <link rel="icon" href="img/favico.png" type="image/png">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
       <meta content="width=device-width, initial-scale=1" name="viewport" />
   </head>
   <body onload="">
      <header>
        
         <nav>
            
            <ul class="topNav">
                 <img alt="NFLStats Logo" class="topLogo" src="img/mainlogo.svg">
                  <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
               <li><a class="activeNav" href="fans.php"><i class="fa fa-user-friends"></i>Fans  &amp; Players Dashboard</a></li>
                  <li><a  <?php if( $_SESSION['coach'] == "N") {echo "class='greyd_menu''";}?>  href="coach.php"><i class="fa fa-football-ball"></i>Coach Dashboard</a></li>
            </ul>
         </nav>
         <svg class="custom-header-shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="white" points="0,100 100,0 100,100"/>
         </svg>
         <div class="welcome-msg">
            <h1>Welcome</h1>
            <h3>to The Premiere NFL Dashboard</h3>
         </div>
      </header>
       
     <div id="content-container">
        <div class="pageNav">
            <ul class="topNav coachNav" >
               <li>
                  <a id="addUserbtn" class ="activeNav">
                  <i class="fa fa-users">
                  </i>Show All Players
                  </a>
               </li>
            </ul>
         </div>
         
         <div class="fans_output">
             
             <div class="form-inline" style="margin-bottom:15px">
              <div class="form-group" style="margin-right:10px;">
               <label for="statType">Stat Type: 
               </label>
               <select class="form-control" id="statType" name="statType"  required="true">
                  <option disabled style="font-weight:700">Offensive
                  </option>
                  <option selected value="Passing Attempts">Passing Attempts
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
               <label for="sortBy">Sort:
               </label>
               <select class="form-control" id="sortBy" name="sortBy"  required="true">
                  <option value="ASC">Ascending</option>
                   <option value="DESC">Decending</option>
               </select>
            </div>
                <button onclick="ShowAllPlayers()" class="btn btn-default">Filter</button>
             </div>
                 
              
                 
                 
      
             
             
    <table  class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Player</th>
        <th scope="col">Height (m)</th>
        <th scope="col">Weight (KG)</th>
         <th scope="col">Top Stat</th>
    </tr>
  </thead>
  <tbody id="output">
      
   
 
  </tbody>
</table>
            
         </div>
         
    </div>
         <script type="text/javascript" src="js/nfl_fan.js"></script>
   </body>
</html>
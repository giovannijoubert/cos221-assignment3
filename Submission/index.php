

<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
if($_SESSION['coach'] == "Y"){
    header("location: coach.php"); // Redirecting To Other Page
    } else {
    header("location: fans.php"); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Login | NFLStats - The Premiere Stats Site</title>
      <meta name="author" content="Giovanni Joubert">
      <meta name="description" content="The Premiere Movie Database">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/main.css" type="text/css">
      <link rel="icon" href="img/favico.png" type="image/png">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
       <meta content="width=device-width, initial-scale=1" name="viewport" />

   </head>
   <body>
      <header>
        
         <nav>
            
            <ul class="topNav">
                 <img alt="NFLStats Logo" class="topLogo" src="img/mainlogo.svg">
                <li><a class="activeNav" href=""><i class="fa fa-key"></i>Login</a></li>
               <li><a class="greyd_menu" href="fans.php"><i class="fa fa-user-friends"></i>Fans  &amp; Players Dashboard</a></li>
               <li><a class="greyd_menu" href="coach.php"><i class="fa fa-football-ball"></i>Coach Dashboard</a></li>
                
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
         
         <form class="form-inline" style="margin:auto; width:50%" method="post" action="">
             <h2>Login:</h2>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button name="submit" value="login" type="submit" class="btn btn-default">Submit</button>
            <br/> <?php echo $error; ?>
             <br/> <br/>
             <a href="register.php">Register</a>
</form>
     
          

    </div>
       
   
   </body>
</html>
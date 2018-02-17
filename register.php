<?php

 ob_start();

 session_start(); // start a new session or continues the previous

 if( isset($_SESSION['users'])!="" ){

  header("Location: home.php"); // redirects to home.php

 }

 include_once 'dbconnect.php';


 $error = false;


 if ( isset($_POST['btn-signup']) ) {

 

  // sanitize user input to prevent sql injection

  $name = trim($_POST['name']);

  $name = strip_tags($name);

  $name = htmlspecialchars($name);

 

  $email = trim($_POST['email']);

  $email = strip_tags($email);

  $email = htmlspecialchars($email);

 

  $pass = trim($_POST['pass']);

  $pass = strip_tags($pass);

  $pass = htmlspecialchars($pass);

 

  // basic name validation

  if (empty($name)) {

   $error = true;

   $nameError = "Please enter your full name.";

  } else if (strlen($name) < 3) {

   $error = true;

   $nameError = "Name must have atleat 3 characters.";

  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {

   $error = true;

   $nameError = "Name must contain alphabets and space.";

  }

 

  //basic email validation

  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

   $error = true;

   $emailError = "Please enter valid email address.";

  } else {

   // check whether the email exist or not

   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";

   $result = mysqli_query($conn, $query);

   $count = mysqli_num_rows($result);

   if($count!=0){

    $error = true;

    $emailError = "Provided Email is already in use.";

   }

  }


  // password validation

  if (empty($pass)){

   $error = true;

   $passError = "Please enter password.";

  } else if(strlen($pass) < 6) {

   $error = true;

   $passError = "Password must have atleast 6 characters.";

  }

 

  // password encrypt using SHA256();

  $password = hash('sha256', $pass);

 

  // if there's no error, continue to signup

  if( !$error ) {

   

   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";

   $res = mysqli_query($conn, $query);

   

   if ($res) {

    $errTyp = "success";

    $errMSG = "Successfully registered, you may login now";

    unset($name);

    unset($email);

    unset($pass);

   } else {

    $errTyp = "danger";

    $errMSG = "Something went wrong, try again later...";

   }

   

  }

 

 

 }

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<title>Login & Registration System</title>

</head>

<body>

<div class="contaner text-center" style="width:50%;">
  <div class="alert alert-info">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

   

       


             <h2>Sign Up.</h2>

             <hr />


           

            <?php

   if ( isset($errMSG) ) {

   

    ?>


             <div class="alert">

 <?php echo $errMSG; ?>

             </div>

 <?php

   }

   ?>

     <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />

     <span class="text-danger"><?php echo $nameError; ?></span>


      <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
      <span class="text-danger"><?php echo $emailError; ?></span>

      <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />

      <span class="text-danger"><?php echo $passError; ?></span>

             <hr />
     <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>


             <hr />

    

     </form>

     <nav class="navbar navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" id="brand-index"></a>
        </div>
        
      </ul>
            
  <a href="index.php"><button type="submit" class="btn btn-lg btn-danger" name="btn-login" id="loginbtn">Sign In</button></a>
  
      </div>
  
</nav>

</div>


</div>

</body>

</html>

<?php ob_end_flush(); ?>
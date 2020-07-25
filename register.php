<?php
ob_start();
session_start(); 
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); 
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 

 $name = trim($_POST['name']);


  $name = strip_tags($name);


  $name = htmlspecialchars($name);
 
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);


 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }


  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {

  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }

  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 8) {
  $error = true;
  $passError = "Password must have atleast 8 characters." ;
 }

$password = hash('sha256' , $pass);


 if( !$error ) {
 
  $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login & Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <br>
        <br>
        <div>
        <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >


                <h2 class="index-color">Register here</h2>
                <h2 class="index-color">Write your name and your E-Mail address and insert a password</h2>
                <hr />

                <?php
   if ( isset($errMSG) ) {
 
    ?>
            <div  class="alert alert-<?php echo $errTyp ?>" >
                          <?php echo  $errMSG; ?>
        </div>
 
 <?php
   }
   ?>




<input tpye ="text" name="name" placeholder ="Insert your name" maxlength = "50" value = "<?php echo $name ?>"/><br>

<span><?php echo $nameError; ?> </span>



<input type = "email" name = "email" placeholder = "Enter Your Email" maxlength = "40" value = "<?php echo $email ?>"  /> <br>
   
   <span> <?php   echo  $emailError; ?> </span >





<input type = "password" name = "pass" placeholder = "Enter Password" maxlength = "15"  /> <br>

   <span><?php echo $passError; ?> </span >

<hr />


<button type = "submit" name = "btn-signup" >Send</button >
<hr />

<p><a href = "index.php">HERE to the next page</a></p>


</form>
</div>
</div>
</body>
</html>
<?php  ob_end_flush(); ?>
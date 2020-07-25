<?php 

require_once 'db_connect.php';

if ($_GET) {
  $name = $_GET['name'];
  $photo = $_GET['photo'];
  $breed = $_GET['breed'];
  $age = $_GET['age'];
  $adoptable = $_GET['adoptable'];
  $description = $_GET['description'];
  $hobbies = $_GET['hobbies'];
  $web = $_GET['web'];
  $location = $_GET['location'];
  $image = $_GET['image'];
  $address = $_GET['address'];
  $city = $_GET['city'];
  $ZIP = $_GET['ZIP'];
  $coordLat = $_GET['coordLat'];
  $coordLon= $_GET['coordLon'];
  $size = $_GET['size'];
  $country = $_GET['country'];
  

   $sql = "SELECT * FROM pet (name, photo, breed, age, adoptable, description, hobbies, web, location, image, address, city, ZIP, coordLat, coordLon, size, country) VALUES ('$name','$photo','$breed','$age','$adoptable','$description','$hobbies','$web','$location','$image','$address','$city','$ZIP','$coordLat','$coordLon', '$size', '$country')";
    if($connect->query($sql) === TRUE) {
      echo "<br><p>Successfully connected</p><br>" ;
   } else  {
       echo "Error " . $sql . ' ' . $connect->connect_error;
   }

   $connect->close();
}

?>
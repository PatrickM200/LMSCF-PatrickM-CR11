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
     $country = $_GET['country'];

     $id = $_GET['id'];

     $sql = "UPDATE pet SET name = '$name', photo = '$photo', breed = '$breed', age = '$age', adoptable = '$adoptable', description = '$description', hobbies = '$hobbies', web = '$web', location = '$location', image = '$image' , address = '$address', city = '$city', ZIP = '$ZIP', coordLat = '$coordLat', coordLon = '$coordLon', country = '$country'   WHERE id = {$id}" ;
    if($connect->query($sql) === TRUE) {

        echo "<p>Successfully updated</p>";
        echo "<a href='../update.php?id=" .$id."'><button tpye='button'>back</button></a>";
        echo "<a href='../admin.php'><button type='button'>back to HOME page</button></a>";
    } else {
        echo "Update error: ". $connect->error;
    }

    $connect->close();
    }

    ?>
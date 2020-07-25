
<?php 

require_once 'actions/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM pet WHERE id = {$id}" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();
   $connect->close();
 }
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>Show PatickM's Pets</title>
 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container-fluid">
    <br>
      <div class="card chead">
           <h1> <span class="rainbow-text"><?php echo $data['name'] ?> </span></h1>
      </div>
    <br>
    <div class="card foglio">
      <div class="row">
          <div class="col">
            <div class="cover">
              <img src="<?php echo $data['photo'] ?>" >
            </div>             
          </div>
          <div class="col">
              <h3> <?php echo $data['name'] ?> </h3>
              <br>
              <h5> A <?php echo $data['breed']?>, <?php echo $data['age']?> years old. </h5><br>
              <hr><p> <?php echo $data['description'] ?>.</p> 

            <?php
            if ($data['size']=="little")
            echo "<p>Whant to see more of this little cutie? <a href=".$data['web'].">click here</a></p><br>";
            else 
            echo "<p> This big beauty loves ".$data['hobbies'].".</p><br>" ;
            ?>

            <?php
            if ($data['age']>8)
            echo "<p>This pet needs a funny owner. " .$data['name']." was given for adoption from ".$data['adoptable']. " and since has lived with a nice family. </p>";
            else
            echo "<p>".$data['name']."  is a young speciment and looking for a family!</p><br>" ;
            ?>

          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col">
             <h5> Where can you find <?php echo $data['name'] ?> ? </h5>
              <p> In <?php echo $data['location']?> <br> <?php echo $data['address']?>, <?php echo $data['city'] ?> (<?php echo $data['ZIP'] ?>) <?php echo $data['country'] ?></p>
              <div class="mini-cover">
                <img src=" <?php echo $data['image'] ?> ">
              </div> 
          </div>
            <div class="col">

    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $data['coordLat'] ?>, lng: <?php echo $data['coordLon'] ?>},
          zoom: 15
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
    async defer></script>

      </div> 
</div>
<hr>
<div class='d-flex justify-content-center'>
    <a href="home.php"><button type="button" class='btn btn-lg'>Back</button></a>
</div>
</div>
<br>
</div>
<footer>
    <h6 class="footer">PatrickM's Pet Adoption</h6>
  </footer>
</body>
</html>
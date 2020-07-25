<?php 

require_once 'actions/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM pet WHERE id = {$id}" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Delete Pet</title>
<link rel="stylesheet" type="text/css" href="style.css">   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
</head>
  <body>
    <div class="container-fluid">
    <br>
      <div class="card chead">
      <h1>Delelte Pets</h1>
      </div>

      <div class="card foglio">
        <h3>Do you want to delete <?php echo $data['name'] ?>?</h3>
        <div class="cover">
              <img src="<?php echo $data['photo'] ?>" >
        </div> 
        <br>

        <form action ="actions/a_delete.php" method="get">
          <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
          <button type="submit" class='btn btn-lg'> Delete it!</button >
          <a href="admin.php"><button type="button" class='btn btn-lg'> Do not delete! </button ></a>
        </form>
      </div>
    </div>
    <br>
    <footer>
            <h6 class="footer">PatrickM's Pet Adoption</h6>
        </footer>
  </body>
  
</html>

<?php
}
?>
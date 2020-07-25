<?php

ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}

$res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$resPet = mysqli_query($conn, "SELECT * FROM pet");

require_once 'actions/db_connect.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>PatrickM's Pet Adoption</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <br>
    <br>
    <div class="card chead">
      <h3>

        <?php $greeting = (date('G') < 14) ? 'Happy day' : 'Happy evening';
        echo $greeting;
        ?>

        <?php echo $userRow['userName']; ?> welcome to PatrickM's Pet Adoption!</h3>
      <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-around">

        <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="general.php">Young</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="senior.php">Senior</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php?logout">Logout</a>
            </li>
          </ul>

        </div>
      </nav>
      <script type="text/javascript">
        $(document).ready(function() {
          $('.search-box input[type="text"]').on("keyup input", function() {
            var input = $(this).val();
            var dropdownresult = $(this).siblings(".result");
            if (input.length) {
              $.get("search.php", {
                term: input
              }).done(function(data) {
                dropdownresult.html(data);
              });
            } else {
              dropdownresult.empty();
            }
          });

          $(document).on("click", ".result p", function() {
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
          });
        });
      </script>
      <form class="search-box form-inline my-2 my-lg-0">
        <lable>Breed Type: (Shepard, Pincher, Samo, Husky)</lable>
        <input class="form-control mr-sm-2" type="text" name="search_term" placeholder="Search breed type" aria-label="Search">
        <div class="result"></div>
      </form>
    </div>
    <br>

    <div class="card foglio">
      <div class="card-columns">

        <?php
        $sql = "SELECT * FROM pet ";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo  "<div class='card scheda'>
                            <img class='card-img-top photo' src='" . $row["photo"] . "'alt='click to see more.'></a>
                          <div class='card-body'>
                            <h5 class='card-title'>" . $row["name"] . "</h5>
                            <p class='card-text'> A " . $row["breed"] . ", " . $row["age"] . " years old.<br> " . $row["city"] . "</p>
                          </div>
                          <div>
                            <a href='a_display.php?id=" . $row['id'] . "'><button type='button' class='btn-sm'>Show</button></a>
                          </div>
                        </div>";
          }
        } else {
          echo  "<center>No Data Avaliable</center>";
        }
        ?>


      </div>
    </div>

    <br>

  </div>
  </div>

  <footer>
    <h6 class="footer">PatrickM - Pet Adoption</h6>
  </footer>

</body>

</html>
<?php ob_end_flush(); ?>
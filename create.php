<!DOCTYPE html>
<html>
<head>
   <title>PatrickM's Pat Adoption - Add a Pet </title>
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
  <h2>PatrickM's Pet Adoption update the pets</h2>
  </div>
  <div class="card foglio">
   <form  class="form-group" action="actions/a_create.php" method= "get">
      
         <div class="row">
        <div class="col">
            <label for="name"> Pet name </label> <br>
              <input  type="text" name="name"  placeholder="name of the pet" /> <br>
            <label for="photo"> Pet Photo Link </label> <br>
              <input  type="text" name="photo"  placeholder="link to the photo of the pet" /> <br>
            <label for="breed"> Pet breed </label> <br>
              <input  type="text" name="breed"  placeholder="breed of the pet" /> <br>  
            <label for="age"> Pet age </label> <br>
              <input  type="text" name="age"  placeholder="age of the pet" /> <br>
            <label for="adoptable"> Pet adoptable date </label> <br>
              <input  type="text" name="adoptable"  placeholder="YYYY/MM/DD" /> <br>
            <label for="description"> Pet discription </label> <br>
              <input  type="text" name="description"  placeholder="a brief description" /> <br>
            <label for="hobbies"> pet hobbies </label> <br>
              <input  type="text" name="hobbies" placeholder="hobbies of the pet" /> <br>
            <label for="web"> Optional pet webpage</label> <br>
              <input  type="text" name="web"  placeholder="link to the webpage of the pet" /> <br>
             </div>
        <div class="col">
            <label for="location"> Pet Location </label> <br>
              <input  type="text" name="location"  placeholder="name of the pet location" /> <br>
            <label for="image"> Link Photo Location </label> <br>
              <input  type="text" name="image"  placeholder="link to the location of the pet" /> <br>
            <label for="address"> Pet address </label> <br>
              <input  type="text" name="address"  placeholder="street & number" /> <br>  
            <label for="ZIP"> Pet ZIP code </label> <br>
              <input  type="text" name="ZIP"  placeholder="zip code of the city" /> <br>
            <label for="city"> Pet city </label> <br>
              <input  type="text" name="city"  placeholder="city" /> <br> 
            <label for="country"> Pet country </label> <br>
              <input  type="text" name="country"  placeholder="country" /> <br> 
             
            <label for="coordLat"> insert google map coordinates </label> <br>
              <input  type="text" name="coordlat"  placeholder="Write here the latitude" /> <br>
            <label for="coordLon">  </label> <br>
              <input  type="text" name="coordLOn"  placeholder="Write here the longitude" /> <br>
        </div>
      </div>
    <hr>
    <br>
        
        <button type ="submit" class='btn-lg'>Add a new Pet</button>
        <a href= "admin.php"><button  type="button" class='btn-lg' >Back to the HOME page</button></a>
   </form>
  </div>
</div>
</body>
</html>
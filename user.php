<!doctype html>
<html lang="en">

<?php



ob_start();  

include 'connection.php';

if(!isset($_COOKIE['name'])){
    header("Location:/info-fetch/");
}

if(!isset($_COOKIE['number'])){
    header("Location:/info-fetch/");
}


   

?>

<head>

  <title>USER</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-light">

<form method='post' >






  <div class="container-sm col-sm-6 col-12 mt-5 row mx-auto">

    <div class="mt-5 shadow rounded-3 bg-white border">










<?php 

$name = $_COOKIE['name'];

$number = $_COOKIE['number'];

$sql = "select * from `fetch` where name = '$name' AND mob_no = $number";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);


?>


    
      <div class="mb-3 mt-4">     
        <div class="dropdown">
          <input type="text" name="nm" class="form-control" id="myInput" placeholder="Type Name" value="<?php echo $row['name'] ?>" disabled>
          <div class="dropdown-menu" aria-labelledby="myInput" id="myDropdown"></div>
        </div>
      </div>
      <div class="mb-3">
        <label for="phno" class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="ph" id="phno" aria-describedby="helpId" placeholder="" value="<?php echo $row['mob_no'] ?>" disabled>
      </div>

      
    <div class="mb-3 row mx-auto">
         
      <a href="update.php?id=<?php echo $row['id'] ?>" type="submit" name="submit" class="btn btn-primary col-4">UPDATE</a>
      
        <div class="col-4"></div>
         
      <button  type="submit" name="out" class="btn btn-primary col-4">DELETE COOKIE</button>
     
        
    </div>


  </div>

 
  





  <!-- Add necessary JavaScript and jQuery libraries here -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</form>

<!------------------------------------------------------------------------------------------------------------->
<?php


if(isset($_POST['out'])){

    setcookie('name','', 3600 * 60 + time(),'/');
    setcookie('number','', 3600 * 60 + time(),'/');

    header("Location:/info-fetch/");

}






ob_end_flush();  
?>
<!------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
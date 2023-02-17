<!doctype html>
<html lang="en">

<?php



ob_start();  

include 'connection.php';



$sql = "SELECT * FROM `fetch`";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

   

?>

<head>
  <title>info-fetch</title>
  
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

if(isset($_GET['id'])){

$id = $_GET['id'];

$sql = "select * from `fetch` where id = $id";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){



$row = mysqli_fetch_array($result);






?>


    
      <div class="mb-3 mt-4">     
        <div class="dropdown">
          <input type="text" name="nm" class="form-control" id="myInput" placeholder="Type Name" value="<?php echo $row['name'] ?>" required>
          <div class="dropdown-menu" aria-labelledby="myInput" id="myDropdown"></div>
        </div>
      </div>
      <div class="mb-3">
        <label for="phno" class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="ph" id="phno" aria-describedby="helpId" placeholder="" value="<?php echo $row['mob_no'] ?>" required >
      </div>

      <div class="mb-3">
          <button type="submit" name="submit" value="" class="btn btn-primary col-12">UPDATE</button>
      </div>

<?php

if(isset($_POST['submit'])){

  $nm = $_POST['nm'];
  $ph = $_POST['ph'];
  
  $sql = "UPDATE `fetch` SET `name`='$nm',`mob_no`= $ph WHERE id = $id";
  
                    if(mysqli_query($con,$sql)){
                        $sql="";

                        header("Location:/info-fetch/update.php?id=$id");

                        echo"<div class='alert alert-success' role='alert'>
                        Data Is Been Updated To Database
                    </div>";


                    }
                    else{
                        echo"<div class='alert alert-danger' role='alert'>
                        Problem in Updating The Data In The Database
                    </div>";
                    }
                    
  
 }
}
else{
    echo"<div class='alert alert-danger mt-3' role='alert'>
   data fetch problem {query data not matched in sql}
</div>";
}





}

else{
    echo"<div class='alert alert-danger mt-3' role='alert'>
                        Some error occured during page redirection
                    </div>";
}


?>




    </div>

    <a type="button" href="/info-fetch/" class="btn btn-primary mt-3 col-sm-2 col-12 shadow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg> Back</a>
<?php 

?>

  </div>

 
  





  <!-- Add necessary JavaScript and jQuery libraries here -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</form>

<!------------------------------------------------------------------------------------------------------------->
<?php



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
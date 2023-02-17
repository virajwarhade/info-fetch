<!doctype html>
<html lang="en">

<?php

ob_start();  

include 'connection.php';

$name = array();

$sql = "SELECT name FROM `fetch`";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
  array_push($name, $row["name"]);
}


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
      <div class="mb-3 mt-4">     
        <div class="dropdown">
          <input type="text" name="nm" value="" class="form-control" id="myInput" placeholder="Type Name" required>
          <div class="dropdown-menu" aria-labelledby="myInput" id="myDropdown"></div>
        </div>
      </div>
      <div class="mb-3">
        <label for="phno" class="form-label">Phone Number</label>
        <input type="number" value="" class="form-control" name="ph" id="phno" aria-describedby="helpId" placeholder="" required >
      </div>

      <div class="mb-3">
          <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary col-12">
      </div>

      <?php

if(isset($_POST['submit'])){

  $nm = $_POST['nm'];
  $ph = $_POST['ph'];
  
  
  $sql = "INSERT INTO `fetch` (`name`, `mob_no`) VALUES ('$nm', '$ph')";
  
  if(mysqli_query($con,$sql)){
    
    header("Location:/info-fetch/");

    echo"<div class='alert alert-success' role='alert'>
     Data Is Been added To Database
  </div>";


  }
  else{
    echo"<div class='alert alert-danger' role='alert'>
     Problem in Adding The Data In The Database
  </div>";
  }
  
  
  
  
  }


?>

    </div>




    <div class="mt-5 shadow rounded-3 bg-white border mb-5">

    <?php

$sql = "SELECT * FROM `fetch`";
$result = mysqli_query($con,$sql);

echo "<table class='table table-striped'>
<thead>
  <tr>
    <th scope='col'>id</th>
    <th scope='col'>Name</th>
    <th scope='col'>Phone Number</th>
    <th scope='col'>Edit</th>
  </tr>
</thead><tbody>";

while($row = mysqli_fetch_array($result)){

echo "

  <tr>
    
    <td>".$row['id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['mob_no']."</td>
    <td><a class='btn btn-primary shadow ' href='update.php?id=".$row['id']."'>
    
    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
  </svg>
  
  Edit</a> </td>
  </tr>
  
";
}
echo "</tbody>
</table>";


    ?>


    </div>



  </div>

 
  





  <!-- Add necessary JavaScript and jQuery libraries here -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




  <script>
  // Define the array of names
  var names = <?php echo json_encode($name); ?>;

  // Attach event listener to input field
  $("#myInput").on("input", function() {
    // Retrieve value from input field
    var value = $(this).val().toLowerCase();

    // Filter the names array to find matching values
    var matches = names.filter(function(name) {
      return name.toLowerCase().startsWith(value);
    });

    // Build the dropdown menu
    var dropdownMenu = $("#myDropdown");
    dropdownMenu.empty();
    for (var i = 0; i < matches.length; i++) {
      var dropdownItem = $("<a class='dropdown-item'></a>");
      dropdownItem.text(matches[i]);
      dropdownItem.on("click", function() {
        $("#myInput").val($(this).text());
        dropdownMenu.hide(); // add this line to hide the dropdown menu after a selection is made
      });
      dropdownMenu.append(dropdownItem);
    }

    // Show or hide the dropdown menu as needed
    if (matches.length > 0) {
      dropdownMenu.show();
    } else {
      dropdownMenu.hide();
    }
  });
</script>







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
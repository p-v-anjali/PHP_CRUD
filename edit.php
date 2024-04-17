<?php
include "connection.php";
$id = "";
$name = "";
$email = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location:CRUD_PHP/index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM crud WHERE id=$id";
    $result = $conn->query($sql);
    // Added condition to check if the query was successful and if any rows were returned
    if (!$result || $result->num_rows == 0) {
        header("location:CRUD_PHP/index.php");
        exit;
    }
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];
} 
   else {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        
        $sql = "UPDATE crud SET name='$name', email='$email' WHERE id='$id'";
        $result = $conn->query($sql);
        // Added error handling for the update query
        if ($result) {
            $success = "Record updated successfully.";
        } else {
            $error = "Error updating record: " . $conn->error;
        }
    }
    ?>
   
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHP CRUD OPERATIONS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
      </form>
    </div>
  </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  <div class="col-lg-6 m-auto">
  
 <form method="post">
 
 <br><br>
 <div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-Black text-center">  Create New Member </h1>
 </div><br>

 <input type="hidden" name="id" value="<?php echo $id; ?>">


 <label> NAME: </label>
<input type="text" name="name" value="<?php echo $name; ?>"><br>

<label> EMAIL: </label>
<input type="text" name="email" value="<?php echo $email; ?>"><br>


 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>
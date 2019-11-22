<!DOCTYPE html>
<html lang="en">
<?php
// Start the session
session_start();
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>LAME ROAD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
  <!-- MDB icon -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    .filter {
      border: 10px solid #eeeeee;
    }
  </style>
</head>
<?php
//Check User
if(isset($_POST['signin'])) 
{
$database="Lameroad";
$server="localhost";
$table="Customers";
$flag=0;
$con=mysqli_connect($server,"root","");
mysqli_select_db($con,$database);
$query="SELECT * FROM $table";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
if($row['email']==$_POST["email"] && $row['pwd']==$_POST["pwd"])
{
echo("Login successful");
$_SESSION["email"]=$_POST["email"];
echo '<script>window.location.href="Dashboard.php";</script>';
$flag=1;
}
}
if($flag!=1)
{
echo "<div class='text-center bg-danger text-white'>Invalid Name or Password</div>";
}
mysqli_close($con);
}

//Create User
if(isset($_POST['signup'])) 
{
$database="Lameroad";
$server="localhost";
$table="Customers";
$name=$_POST["name"];
$email=$_POST["email"];
$pwd=$_POST["pwd"];
$flag=0;
$con=mysqli_connect($server,"root","");
mysqli_select_db($con,$database);
$query="SELECT * FROM $table";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
if($row['email']==$email)
{
echo "<div class='text-center bg-danger text-white'>Account already exists!</div>";
$flag=1;
}
}
if($flag!=1)
{
    $query="INSERT INTO $table (name,email,pwd) VALUES ('$name','$email','$pwd')";
    $result=mysqli_query($con,$query);
echo "<div class='text-center bg-success text-white'>Registration Successful!</div>";
}
mysqli_close($con);
}
?>

<body id="body" style="background-color: #eeeeee;">
  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
      aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fab fa-facebook-f"></i> Facebook
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fab fa-instagram"></i> Instagram</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->
  <!--Body-->
    <div class="container">
        <center>
            <h1 class="mt-5">
                <b><i>LameRoad</i></b>
            </h1>
            <b>
                <h3>WE PUT THE LAME ON THE ROAD.</h3>
            </b>
            <br>
        </center>
    </div>
  <div class="text-center mt-5 container w-75">
    <div class="card-columns" style="column-count: 2;">
      <div class="card shadow-none">
        <div>
          <h2 class="card-title h2 mt-3">NEW HERE? REGISTER NOW!</h2>
          <div class="card-body text-center">
            <form action="" method="POST">
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="email" name="email" class="form-control" placeholder="E-Mail">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="password" name="pwd" class="form-control" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="password" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="submit" class="btn btn-info" name="signup" value="SIGN-UP" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card shadow-none">
        <div>
          <h2 class="card-title h2 mt-3">ALREADY A MEMBER? SIGN-IN!</h2>
          <div class="card-body text-center">
            <form action="" method="POST">
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="email" name="email" class="form-control" placeholder="E-Mail">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="password" name="pwd" class="form-control" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="submit" name="signin" class="btn btn-info" value="SIGN-IN" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/.Body-->
  <!-- jQuery -->
  <script type=" text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">


  </script>

</body>

</html>
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
  <script>
    var scrollAmt = 100;
    var count = 0;

    xhr = new XMLHttpRequest();
    function monitor() {
      // this.xhr.onreadystatechange = this.update;
      // this.xhr.open("GET", "backend.php", true);
      // this.xhr.send();
      scroll = document.body.scrollTop || document.documentElement.scrollTop;
      if (scroll > scrollAmt) {
        scrollAmt = scroll+scrollAmt;
        console.log(count);
        this.xhr.onreadystatechange = this.update;
        this.xhr.open("GET", "backend.php", true);
        this.xhr.send();
      }
    }

    function update() {
      count++;
      if (this.readyState == 4 && this.status == 200) {
        console.log(this);
        var cnt = this.responseText.split("#");
        if(typeof cnt[count] !== 'undefined')
        {
        document.getElementById("cardrow").innerHTML += cnt[count];
        }
        //this.abort();
        //obj.monitor();
      }
    }


    window.onscroll = monitor;
    function dummyload() {
      setTimeout(filterload, 0);
    }
    function filterload() {
      document.getElementById("filter").style.display = "block";
      setTimeout(cardfilter, 0);
    }
    function cardfilter() {
      document.getElementById("card").style.display = "block";
    }

    function redirect(i)
    {
      sessionStorage.setItem("Dashvalue", i);
      window.location.replace("http://localhost/LAME%20ROAD/CarInfo.php")
    }
  </script>
</head>

<body id="body" style="background-color: #eeeeee;">
  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i>LameRoad</i></a>
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
        <li class="nav-item">
          <a class="nav-link" href="#">
            <?php
            $inemail=$_SESSION["email"];
            $database="Lameroad";
            $server="localhost";
            $table="Customers";
            $con=mysqli_connect($server,"root","");
            mysqli_select_db($con,$database);
            $query="SELECT * FROM $table WHERE email='$inemail'";
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_array($result);
            echo($row['name']);
            ?>            
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <i class="fas fa-sm fa-sign-in-alt"></i> LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->
  <!--Body-->
  <div id="filter" class="container text-center w-75 mt-3">
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('Volkswagen')"> Volkswagen</button>
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('Toyota')"> Toyota</button>
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('Ford')"> Ford</button>
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('Honda')"> Honda</button>
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('BMW')"> BMW</button>
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('Nissan')"> Nissan</button>
    <button class="btn btn-dark rounded-pill" onclick="filterSelection('filter')"> ALL</button>
  </div>
  <div id="card" class="text-center container w-75 mt-4">
    <div class="row" id="cardrow">
      <div class="shadow-none card col-4 filter Volkswagen HB" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
              <a onclick="redirect(0);"><img id="cardimg" class="card-img-top" src="img/Cars/Polo.png" alt="Card image cap"></a>
          </div>
          <div id="cardbody">
          <form action="" method="POST">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="carname" value="New Polo" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">Experience the power to play.</p>
            <h6>
              <span class="badge badge-dark p-2">Volkswagen</span>
              <span class="badge badge-dark p-2">Hatchback</span>
            </h6>
            <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
            <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
            </form>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Volkswagen Sedan" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
              <a onclick="redirect(1);"><img id="cardimg" class="card-img-top" src="img/Cars/Vento.png" alt="Card image cap"></a>
          </div>
          <div id="cardbody">
          <form action="" method="POST">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="carname" value="New Vento" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">Turn heads in the New Vento.</p>
            <h6>
              <span class="badge badge-dark p-2">Volkswagen</span>
              <span class="badge badge-dark p-2">Sedan</span>
            </h6>
            <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
            <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
            </form>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Volkswagen Sedan" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
              <a onclick="redirect(2);"><img id="cardimg" class="card-img-top" src="img/Cars/Passat.png" alt="Card image cap"</a>>
          </div>
          <div id="cardbody">
          <form action="" method="POST">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="carname" value="Passat" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">Luxury you can't give up.</p>
            <h6>
              <span class="badge badge-dark p-2">Volkswagen</span>
              <span class="badge badge-dark p-2">Sedan</span>
            </h6>
            <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
            <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
            </form>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Volkswagen SUV" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
              <a onclick="redirect(3);"><img id="cardimg" class="card-img-top" src="img/Cars/Tiguan.png" alt="Card image cap"</a>>
          </div>
          <div id="cardbody">
          <form action="" method="POST">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="carname" value="The Tiguan" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">For the Journeys within.</p>
            <h6>
              <span class="badge badge-dark p-2">Volkswagen</span>
              <span class="badge badge-dark p-2">SUV</span>
            </h6>
            <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
            <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
            </form>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Toyota SUV" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
              <a onclick="redirect(4);"><img id="cardimg" class="card-img-top" src="img/Cars/Fortuner.png" alt="Card image ca</a>p">
          </div>
          <div id="cardbody">
          <form action="" method="POST">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="carname" value="Fortuner" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">New Legend of the Pride.</p>
            <h6>
              <span class="badge badge-dark p-2">Toyota</span>
              <span class="badge badge-dark p-2">SUV</span>
            </h6>
            <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
            <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
            </form>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Toyota HB" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
              <a onclick="redirect(5);"><img id="cardimg" class="card-img-top" src="img/Cars/Corolla.png" alt="Card image cap</a>">
          </div>
          <div id="cardbody">
          <form action="" method="POST">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="carname" value="Corolla" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">Mark a New High.</p>
            <h6>
              <span class="badge badge-dark p-2">Toyota</span>
              <span class="badge badge-dark p-2">Hatchback</span>
            </h6>
            <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
            <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
if(isset($_POST['ADD'])) 
{
$database="Lameroad";
$server="localhost";
$table="Orders";
$email=$inemail;
$carname=$_POST["carname"];
$quantity=$_POST["quantity"];
$flag=0;
$con=mysqli_connect($server,"root","");
mysqli_select_db($con,$database);
$query="SELECT * FROM $table";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
if($row['email']==$email && $row['carname']==$carname)
{
    $query1="UPDATE $table SET quantity=quantity+$quantity WHERE email='$email' AND carname='$carname'";
    $result1=mysqli_query($con,$query1);
$flag=1;
}
}
if($flag!=1)
{
    $query2="INSERT INTO $table (email,carname,quantity) VALUES ('$email','$carname',$quantity)";
    $result2=mysqli_query($con,$query2);
}
mysqli_close($con);
}
?>
  </div>
  <!--/.Body-->
  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
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
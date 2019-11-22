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
    #home-section {
background-size:cover;
height:900px;
position:relative;
}
div.home-content {
  position:absolute;
  bottom:150px;
  left: 0; 
  right: 0; 
  margin-left: auto; 
  margin-right: auto; 
}
  </style>
  <script>
    xhr = new XMLHttpRequest();
    function monitor() {
      this.xhr.onreadystatechange = this.update;
      this.xhr.open("GET", "contents.txt", true);
      this.xhr.send();
    }
    function update() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this);
        var sstor = sessionStorage.getItem("Dashvalue");
        var i=parseInt(sstor)*8;
        if(i!=0)
        {
            i++;
        }
        var cnt = this.responseText.split(";");
        document.getElementById("brand").innerHTML = cnt[i];
        document.getElementById("model").innerHTML = cnt[i+1];
        document.getElementById("val").value = cnt[i+2];
        document.getElementById("quan").value = cnt[i+3];
        document.getElementById("price").value = cnt[i+4];
        document.getElementById("pricedesc").innerHTML = cnt[i+5];
        document.getElementById("warranty").value = cnt[i+6];
        document.getElementById("warrantydesc").innerHTML = cnt[i+7];
        setTimeout(getpic,4000);
        //this.abort();
        //obj.monitor();
      }
    }
    function getpic()
    {
      this.xhr.onreadystatechange = this.showImg;
      this.xhr.open("GET", "contents.txt", true);
      this.xhr.send();
    }

    function showImg()
    {
        var sstor = sessionStorage.getItem("Dashvalue");
        var i=parseInt(sstor)*8;
        if(i!=0)
        {
            i++;
        }
        if(xhr.readyState == 4 && xhr.status == 200)
			{
                var cnt = this.responseText.split(";");
				document.getElementById("home-section").style.backgroundImage = cnt[i+8];	
			}
    }

      </script>
</head>
<body id="body" style="background-color: #eeeeee;" onload="monitor()">
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
  <div id="home-section" class="image-bg vertical-align">
    <div class="container">
        <div class="home-content padding text-center">
        <form action="" method="POST">
            <center>
            <div class="card shadow-none rounded-0 col-3">
            <h1 id="brand" class="jumbo text-center text-black font-weight-bold"></h1>   
            <h1 id="model" class="jumbo text-center text-black font-weight-bold"></h1>   
            </div>  
            <input type="text" id="val" name="carname" value="" class="form-control form-control-lg text-center" style="opacity:0;">
            <input type="number" id="quan" class="m-0" name="quantity" value="" style="opacity:0;"/><br>
            <input type="submit" class="btn btn-danger mt-0 mb-5" name="ADD" value="ADD TO CART" /> 
            </center>
        </form>
    <div id="card" class="text-center container w-75 mt-5">
    <div class="row" id="cardrow">
      <div class="shadow-none card col-4 filter Volkswagen HB" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
          <i class="far fa-lg fa-money-bill-alt"></i>
          </div>
          <div id="cardbody">
          <div class="col">
                  <div class="md-form mt-0">
                    <input id="price" type="text" value="" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p id="pricedesc" class="card-text">Own the New Polo at an offer price starting at Rs. 5.29 lakh. *</p>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Volkswagen HB" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
          <i class="fas fa-lg fa-medal"></i>
          </div>
          <div id="cardbody">
          <div class="col">
                  <div class="md-form mt-0">
                    <input id="warranty" type="text" value="" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p id="warrantydesc" class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="shadow-none card col-4 filter Volkswagen HB" style="display:block;">
        <div class="card-body">
          <div class="view overlay">
          <i class="fas fa-lg fa-car"></i>
          </div>
          <div id="cardbody">
          <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" value="Test Drive" class="form-control form-control-lg text-center" readonly>
                  </div>
                </div>
            <p class="card-text">Experience the true elegance and thoughtfulness of the new Vento. Book a test drive now!</p>
          </div>
        </div>
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
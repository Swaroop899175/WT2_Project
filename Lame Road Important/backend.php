<?php
session_start();
extract($_GET);
//header("Content-type:text"); 
//$file = file_get_contents("Content.txt");
//$str_arr = explode (";", $file);  
for($i=0;$i<10;$i++)
{
    echo '
    <div class="shadow-none card col-4 filter Ford Sedan" style="display:block;">
    <div class="card-body">
      <div class="view overlay">
          <a onclick="redirect(14);"><img id="cardimg" class="card-img-top" src="img/Cars/Aspire.png" alt="Card image cap"></a>
      </div>
      <div id="cardbody">
      <form action="" method="POST">
      <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="carname" value="Aspire" class="form-control form-control-lg text-center" readonly>
              </div>
            </div>
        <p class="card-text">Choose your Own Path. Why Follow?</p>
        <h6>
          <span class="badge badge-dark p-2">Ford</span>
          <span class="badge badge-dark p-2">Sedan</span>
        </h6>
        <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
        <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
        </form>
      </div>
    </div>
  </div>
  <div class="shadow-none card col-4 filter Ford HB" style="display:block;">
    <div class="card-body">
      <div class="view overlay">
      <a onclick="redirect(13);"><img id="cardimg" class="card-img-top" src="img/Cars/Figo.png" alt="Card image cap"></a>
      </div>
      <div id="cardbody">
      <form action="" method="POST">
      <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="carname" value="Figo" class="form-control form-control-lg text-center" readonly>
              </div>
            </div>
        <p class="card-text">Play Smart. Why Follow?</p>
        <h6>
          <span class="badge badge-dark p-2">Ford</span>
          <span class="badge badge-dark p-2">Hatchback</span>
        </h6>
        <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
        <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
        </form>
      </div>
    </div>
  </div>
  <div class="shadow-none card col-4 filter Ford SUV" style="display:block;">
  <div class="card-body">
    <div class="view overlay">
    <a onclick="redirect(12);"><img id="cardimg" class="card-img-top" src="img/Cars/Endeavour.png" alt="Card image cap"></a>
    </div>
    <div id="cardbody">
    <form action="" method="POST">
    <div class="col">
            <div class="md-form mt-0">
              <input type="text" name="carname" value="Endeavour" class="form-control form-control-lg text-center" readonly>
            </div>
          </div>
      <p class="card-text">Discover More in You.</p>
      <h6>
        <span class="badge badge-dark p-2">Ford</span>
        <span class="badge badge-dark p-2">Sedan</span>
      </h6>
      <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
      <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
      </form>
    </div>
  </div>
</div>#
<div class="shadow-none card col-4 filter BMW HB" style="display:block;">
    <div class="card-body">
      <div class="view overlay">
      <a onclick="redirect(11);"><img id="cardimg" class="card-img-top" src="img/Cars/I Three.png" alt="Card image cap"></a>
      </div>
      <div id="cardbody">
      <form action="" method="POST">
      <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="carname" value="i3" class="form-control form-control-lg text-center" readonly>
              </div>
            </div>
        <p class="card-text">Electrify Inspiration.</p>
        <h6>
          <span class="badge badge-dark p-2">BMW</span>
          <span class="badge badge-dark p-2">Hatchback</span>
        </h6>
        <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
        <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
        </form>
      </div>
    </div>
  </div>
  <div class="shadow-none card col-4 filter BMW SUV" style="display:block;">
    <div class="card-body">
      <div class="view overlay">
      <a onclick="redirect(10);"><img id="cardimg" class="card-img-top" src="img/Cars/X Two.png" alt="Card image cap"></a>
      </div>
      <div id="cardbody">
      <form action="" method="POST">
      <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="carname" value="X2" class="form-control form-control-lg text-center" readonly>
              </div>
            </div>
        <p class="card-text">Carpe Momentum.</p>
        <h6>
          <span class="badge badge-dark p-2">BMW</span>
          <span class="badge badge-dark p-2">SUV</span>
        </h6>
        <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
        <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
        </form>
      </div>
    </div>
  </div>
  <div class="shadow-none card col-4 filter Ford Sedan" style="display:block;">
  <div class="card-body">
    <div class="view overlay">
    <a onclick="redirect(9);"><img id="cardimg" class="card-img-top" src="img/Cars/Mustang.png" alt="Card image cap"></a>
    </div>
    <div id="cardbody">
    <form action="" method="POST">
    <div class="col">
            <div class="md-form mt-0">
              <input type="text" name="carname" value="Mustang" class="form-control form-control-lg text-center" readonly>
            </div>
          </div>
      <p class="card-text">A New take on a Classic Theme.</p>
      <h6>
        <span class="badge badge-dark p-2">Ford</span>
        <span class="badge badge-dark p-2">Sedan</span>
      </h6>
      <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
      <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
      </form>
    </div>
  </div>
</div>#
<div class="shadow-none card col-4 filter Toyota HB" style="display:block;">
    <div class="card-body">
      <div class="view overlay">
      <a onclick="redirect(8);"><img id="cardimg" class="card-img-top" src="img/Cars/Yaris.png" alt="Card image cap"></a>
      </div>
      <div id="cardbody">
      <form action="" method="POST">
      <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="carname" value="Yaris" class="form-control form-control-lg text-center" readonly>
              </div>
            </div>
        <p class="card-text">Let the Fun Begin!</p>
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
  <div class="shadow-none card col-4 filter BMW Sedan" style="display:block;">
    <div class="card-body">
      <div class="view overlay">
      <a onclick="redirect(7);"><img id="cardimg" class="card-img-top" src="img/Cars/The Seven.png" alt="Card image cap"></a>
      </div>
      <div id="cardbody">
      <form action="" method="POST">
      <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="carname" value="The 7" class="form-control form-control-lg text-center" readonly>
              </div>
            </div>
        <p class="card-text">The Peak of Luxury.</p>
        <h6>
          <span class="badge badge-dark p-2">BMW</span>
          <span class="badge badge-dark p-2">Sedan</span>
        </h6>
        <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
        <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
        </form>
      </div>
    </div>
  </div>
  <div class="shadow-none card col-4 filter BMW SUV" style="display:block;">
  <div class="card-body">
    <div class="view overlay">
    <a onclick="redirect(6);"><img id="cardimg" class="card-img-top" src="img/Cars/X Seven.png" alt="Card image cap"></a>
    </div>
    <div id="cardbody">
    <form action="" method="POST">
    <div class="col">
            <div class="md-form mt-0">
              <input type="text" name="carname" value="X 7" class="form-control form-control-lg text-center" readonly>
            </div>
          </div>
      <p class="card-text">Make Everyday Legendary.</p>
      <h6>
        <span class="badge badge-dark p-2">BMW</span>
        <span class="badge badge-dark p-2">SUV</span>
      </h6>
      <input type="number" class="m-0" name="quantity" value="1" style="opacity:0;"/>
      <input type="submit" class="btn btn-danger mt-0" name="ADD" value="ADD TO CART" /> 
      </form>
    </div>
  </div>
</div>#';
    $i++;
}
?>        
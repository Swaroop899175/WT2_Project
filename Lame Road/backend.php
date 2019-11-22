<?php
session_start();
extract($_GET);
//header("Content-type:text"); 
$file = file_get_contents("Content.txt");
$str_arr = explode (";", $file);  
for($i=0;$i<10;$i++)
{
    echo '<div class="shadow-none card col-4 filter Volkswagen HB" style="display: block;">
    <div class="card-body">
      <div class="view overlay">
        <a href="">
          <img id="cardimg" class="card-img-top" src="img/Cars/Polo.png" alt="Card image cap">
      </div>
      <div id="cardbody">
        <h4 class="card-title text-dark">'.$str_arr[$i].'</h4>
        <p class="card-text">'.$str_arr[$i+1].'</p>
        <h6>
          <span class="badge badge-dark p-2">Volkswagen</span>
          <span class="badge badge-dark p-2">Hatchback</span>
        </h6>
      </div>
    </div>
    </a>
  </div>#<div class="shadow-none card col-4 filter Volkswagen HB" style="display: block;">
  <div class="card-body">
    <div class="view overlay">
      <a href="">
        <img id="cardimg" class="card-img-top" src="img/Cars/Polo.png" alt="Card image cap">
    </div>
    <div id="cardbody">
      <h4 class="card-title text-dark">'.$str_arr[$i].'</h4>
      <p class="card-text">'.$str_arr[$i+1].'</p>
      <h6>
        <span class="badge badge-dark p-2">Volkswagen</span>
        <span class="badge badge-dark p-2">Hatchback</span>
      </h6>
    </div>
  </div>
  </a>
</div>#';
    $i++;
}
?>        
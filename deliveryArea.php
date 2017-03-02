<?php
    $url ="https://maps.googleapis.com/maps/api/distancematrix/";
    $orig ="";
    $destination ="";
    $delivDist=5;
    $key ="";

    function calculateDistance()
    {

    }
    class dist_calc
    {
    	
    }


  ?>
  <style>
  </style>

  <html>
    <head>
        <div id="formDiv" style="border:solid black 5px; position=relative; height:70px; width:300px">
            <form id="dataDiv" style="padding:10px; margin-left:10px">
                Enter your Address:<br>
                <input type="text" id="delivAdd" name="delivAdd" style="margin-left:5px"></input>
                <button onclick=calculateDistance()>Submit</button>
            </form>
        </div>
    </head>
  </html>
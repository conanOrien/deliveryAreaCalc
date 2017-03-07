<?php
    $units = "";
    $orig ="";
    $destination ="";
    $delivDist=5;
    $key ="";

    class dist_calc
    {
	private $url = "https://maps.googleapis.com/maps/api/distancematrix/json?";
	private $units;
	private $orig;
	private $dest;
	private $deliveDist;
	private $key;
	private $request;
	
    	function calculateDistance(){
		$request = $url."units=".$units."&origins=".$orig."&destinations=".$dest."&key=".$key;

		$ch = curl_init($request);
		

		curl_close($ch);
	}
	function setOrig(origin){
		$orig = origin;
	}
	
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

<?php
    function debug( $data ) {
      $output = $data;
      if ( is_array( $output ) )
	      $output = implode(',', $output);

      echo "<script>console.log( 'Debug Objects: " . $output . "\n' );</script>";      
    }

    class dist_calc
    {
	private $key        = '';
	private $url        = 'https://maps.googleapis.com/maps/api/distancematrix/json?';
	private $units      = "";
	private $orig       = "";
	private $dest       = "";
	private $deliveDist = 0;
	private $request    = "";
	function setOrig($origin){$this->orig = $origin;}
	function setUnit($unit){$this->units = $unit;}
	function setDest($des){$this->dest = $des;}
	function setDDist($delivD){$this->deliveDist = $delivD;}
	function setReq($req){$this->request = $req;}

    	function calculateDistance(){
		$this->setReq($this->url."units=".$this->units."&origins=".$this->orig."&destinations=".$this->dest."&key=".$this->key);
		$delDist = $this->queryServ($this->request);

	}
	function queryServ($req){
		$ch = curl_init($req);
		$res = curl_exec($ch);
		curl_close($ch);
	}
	function init($dLoc){
		$this->setUnit('imperial');
		$this->setOrig('12+Summit+Street+Newark+NJ');
		$this->setDest($dLoc);
		$this->setDDist(5);
	}

	
    }
    function prepareInput($input){
      $input = preg_replace('/\s+/', '+', $input);
      return $input;
    }

    $delivAddress = htmlspecialchars($_GET["dLocation"]);
    $query = new dist_calc;
    $query->init(prepareInput($delivAddress));
    $query->calculateDistance();
?>

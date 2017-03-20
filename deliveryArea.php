<html>
  
  <style>
  </style>
  
  <body>
      <div id="formDiv" style="border:solid black 5px; position=relative; height:90px; width:300px">
          <form id="dataDiv" style="padding:10px; margin-left:10px">
              Enter your Address:<br>
              <input type="text" id="delivAdd" name="delivAdd" style="margin-left:5px"></input>
	      <button id="submit" >Submit</button>
	      <p id="result" style="background:gray;color:white;text-align:center;margin-left:5px;margin-right:23px; padding:2px;"> Results will appear here</p>
          </form>
      </div>



      <script>
        document.getElementById("submit").addEventListener("click", function(event){
     	  event.preventDefault();
	  printResults();
        });

	function printResults(){
	  var req = new XMLHttpRequest();
          var param = document.getElementById('delivAdd').value;
	  req.open('GET','updated.php?dLocation='+param, true)
          req.send();

	  req.onreadystatechange = function () {
	    var DONE = 4;
	    var OK = 200;
	    if (req.readyState === DONE) {
	      if (req.status === OK)      
		res = JSON.parse(req.responseText);
		if(+res['rows'][0]['elements'][0]['distance']['value'] <= 29040){
		  console.log("YES!");	
		  document.getElementById('result').innerHTML = "YES! We Deliver!";
		  document.getElementById('result').style.background = "green";
		}
		else if(+res['rows'][0]['elements'][0]['distance']['value'] > 29040){
                  console.log("nope!");
		  document.getElementById('result').innerHTML = "Sorry, too far!";
		  document.getElementById('result').style.background = "red";
		}		
	    } else if(req.status !== OK) {
                console.log('Error: ' + req.status);
	    }
	  }
	};
      </script>
  </body>

</html>

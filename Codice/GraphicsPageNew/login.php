<html>
   
	<head>
		<title>Login Page</title>
      
		<style>
			body {  
				background: floralwhite;
				padding: 16px;
			}
				

			.slidecontainer {
    			width: 50%;
    			margin-left: 25%;
			}

			.slider {
			    -webkit-appearance: none;
			    width: 100%;
			    height: 25px;
			    background: #d3d3d3;
			    outline: none;
			    -webkit-transition: .2s;
			}

			.slider:hover {
			    opacity: 1;
			}

			.slider::-webkit-slider-thumb {
			    -webkit-appearance: none;
			    appearance: none;
			    width: 25px;
			    height: 25px;
			    background: #4CAF50;
			    cursor: pointer;
			}

			.slider::-moz-range-thumb {
			    width: 25px;
			    height: 25px;
			    background: #4CAF50;
			    cursor: pointer;
			}

			.tbox{
				width:50px;

			}
		</style>
      
	</head>
   
	<body onload="valoriStandard()">
   		<div class="slidecontainer" align="center">

	    	<p>Edges Density:</p>
	  		<input type="range" min="1" max="50" value="1" class="slider" id="density" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="densityValue">
	
	    	<p>Initial Scale:</p>
	  		<input type="range" min="1" max="10" value="4" class="slider" id="scale" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="scaleValue">

	    	<p>Step Size:</p>
	  		<input type="range" min="1" max="5" value="2" class="slider" id="size" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="sizeValue">
		</div>

		<script type="text/javascript">
			function valoriStandard(){
				document.getElementById("densityValue").disabled = true;
				document.getElementById("scaleValue").disabled = true;
				document.getElementById("sizeValue").disabled = true;

				document.getElementById("densityValue").value = document.getElementById("density").value/10;
				document.getElementById("scaleValue").value = document.getElementById("scale").value;
				document.getElementById("sizeValue").value = document.getElementById("size").value;
			}

			function nuovoValore(){
				document.getElementById("densityValue").value = document.getElementById("density").value/10;
				document.getElementById("scaleValue").value = document.getElementById("scale").value;
				document.getElementById("sizeValue").value = document.getElementById("size").value;
			}
		</script>

   </body>
</html>
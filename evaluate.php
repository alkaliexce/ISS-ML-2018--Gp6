<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<title>Model evaluation</title>
         <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.13.0"> </script>
         <script src="helpers.js"></script>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script src="preprocess_scripts.js"></script>
                <script src="helpers.js"></script>
        <script src="tensorflow_scripts.js"></script>
        <script src="PapaParse/papaparse.min.js"></script>
    </head>
    <body>
<script>
  var data;
 
  function handleFileSelect(evt) {
    var file = evt.target.files[0];
 
    Papa.parse(file, {
      dynamicTyping: true,
      complete: function(results) {
        results.data.shift();
        //remove the last row (empty row)
        results.data.pop();
        //pre-process the array
		
        disp = preProcessArray(results.data);
        disp = shuffle(disp);
        //train the model using pre-processed array and upload to server
        evaluateModel(getX(disp),getY(disp));
        //trainModel(getX(disp),getY(disp),10);
      }
    });
  }
 
  $(document).ready(function(){
    $("#csv-file").change(handleFileSelect);
  });
  function showEvaluatedRMSE(error)
  {
      $("#resultDiv").show();
	$("#evaluateResult").text("RMS error: " + error);
  }
</script>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.php">HDB Price Prediction</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="predict.php">Predict Price</a>
		  </li>
		  <li class="nav-item active">
			<a class="nav-link" href="admin.php">Admin Features</a>
		  </li>
		</ul>
	  </div>
	</nav>
	<div class="container">
		<div>
			<div class=" text-center">
				<h1>Evaluate Model</h1>
			</div>
                    <div>
                        <h3><a style="color: red">WARNING:</a> Please clear browser cache before use as your browser may cache the preloaded model. This will result in wrong values!!!</h3>
                    </div>
			<div class="alert alert-info" role="alert">
				<p>Here we can use a test dataset to evaluate model accuracy</p>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text">Upload</span>
				  </div>
				  <div class="custom-file">
					<input type="file" class="custom-file-input" id="csv-file"  name="files">
					<label class="custom-file-label" for="csv-file">Choose file</label>
				  </div>
				</div>
			</div>
			<div class="alert alert-secondary" style="display:none" id="resultDiv" role="alert">
                            <a id="evaluateResult"></a>
			</div>
		</div>
	</div>			
</body>


</html>

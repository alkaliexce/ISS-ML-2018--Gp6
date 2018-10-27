<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>HDB Price Prediction</title>
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
		<br/>
		<div class="container">
			<div class="alert alert-primary" role="alert">
				Here is the place to <a href ='onlinetrain.php'>Add data to Model</a> (train on new data point) 
			</div>
			<div class="alert alert-info" role="alert">
				Here is the place to <a href='train.php'>Re-Train/Initialise Model (Upload a CSV and get a brand new model)</a>
			</div>
			<div class="alert alert-danger" role="alert">
			   Existing Model Information: <?php if (file_exists(__DIR__.'/model/model.json')&&file_exists(__DIR__.'/model/model.weights.bin')){?>
				 Model Last Updated: <?php echo date("F d Y H:i:s.",filemtime(__DIR__.'/model/model.json')); ?> <a href='deleteModel.php' onclick="return confirm('Confirm Deletion of model?')">[Delete?]</a>
				 <?php } else{?>
				 No uploaded Model yet!
				 <?php }?>
			</div>
         </br>
        
		 </div>
    </body>
</html>

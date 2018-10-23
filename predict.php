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
        <script src="tensorflow_scripts.js"></script>
    </head>
    <body>
		<div class="container">
			<div>
				<div class=" text-center">
					<h1>HDB price prediction</h1>
				</div>
				<div class="form-group row">
					<label for="date"  class="col-sm-4 col-form-label">Date</label>
					<div class="col-sm-8 ">
						<div class="input-group date">
							<input type="text" class="form-control" id="date"  placeholder="2018-01" />
							<div class="input-group-append">
								<span class="fa fa-calendar input-group-text" aria-hidden="true "></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="town"  class="col-sm-4 col-form-label">Town</label>
					<div class="col-sm-8">
						<select class="form-control" id="town" placeholder="Please select one" >
							<option value="">Please select one</option>
							<option value="ANG MO KIO">ANG MO KIO</option>
							<option value="BEDOK">BEDOK</option>
							<option value="BISHAN">BISHAN</option>
							<option value="BUKIT BATOK">BUKIT BATOK</option>
							<option value="BUKIT MERAH">BUKIT MERAH</option>
							<option value="BUKIT PANJANG">BUKIT PANJANG</option>
							<option value="BUKIT TIMAH">BUKIT TIMAH</option>
							<option value="CENTRAL AREA">CENTRAL AREA</option>
							<option value="CHOA CHU KANG">CHOA CHU KANG</option>
							<option value="CLEMENTI">CLEMENTI</option>
							<option value="GEYLANG">GEYLANG</option>
							<option value="HOUGANG">HOUGANG</option>
							<option value="JURONG EAST">JURONG EAST</option>
							<option value="JURONG WEST">JURONG WEST</option>
							<option value="KALLANG/WHAMPOA">KALLANG/WHAMPOA</option>
							<option value="MARINE PARADE">MARINE PARADE</option>
							<option value="PASIR RIS">PASIR RIS</option>
							<option value="PUNGGOL">PUNGGOL</option>
							<option value="QUEENSTOWN">QUEENSTOWN</option>
							<option value="SEMBAWANG">SEMBAWANG</option>
							<option value="SENGKANG">SENGKANG</option>
							<option value="SERANGOON">SERANGOON</option>
							<option value="TAMPINES">TAMPINES</option>
							<option value="TOA PAYOH">TOA PAYOH</option>
							<option value="WOODLANDS">WOODLANDS</option>
							<option value="YISHUN">YISHUN</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="flatType"  class="col-sm-4 col-form-label">Flat Type</label>
					<div class="col-sm-8">
						<select class="form-control" id="flatType"  placeholder="Choose one" >
							<option value="">Please select one</option>
							<option value="1 ROOM">1 ROOM</option>
							<option value="2 ROOM">2 ROOM</option>
							<option value="3 ROOM">3 ROOM</option>
							<option value="4 ROOM">4 ROOM</option>
							<option value="5 ROOM">5 ROOM</option>
							<option value="EXECUTIVE">EXECUTIVE</option>
							<option value="MULTI-GENERATION">MULTI-GENERATION</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="flatModel"  class="col-sm-4 col-form-label">Flat Model</label>
					<div class="col-sm-8">
						<select class="form-control" id="flatModel"  placeholder="Choose one" >
							<option value="">Please select one</option>
							<option value="Improved">Improved</option>
							<option value="New Generation">New Generation</option>
							<option value="Model A">Model A</option>
							<option value="Standard">Standard</option>
							<option value="Simplified">Simplified</option>
							<option value="Premium Apartment">Premium Apartment</option>
							<option value="Maisonette">Maisonette</option>
							<option value="Apartment">Apartment</option>
							<option value="Model A2">Model A2</option>
							<option value="Type S1">Type S1</option>
							<option value="Type S2">Type S2</option>
							<option value="Adjoined flat">Adjoined flat</option>
							<option value="Terrace">Terrace</option>
							<option value="DBSS">DBSS</option>
							<option value="Model A-Maisonette">Model A-Maisonette</option>
							<option value="Premium Maisonette">Premium Maisonette</option>
							<option value="Multi Generation">Multi Generation</option>
							<option value="Premium Apartment Loft">Premium Apartment Loft</option>
							<option value="Improved-Maisonette">Improved-Maisonette</option>
							<option value="2-room">2-room</option>
							<option value="Premium Apartment">Premium Apartment</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="Storey"  class="col-sm-4 col-form-label">Storey</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="Storey"  placeholder="10" onkeypress="return isNumberKey(event)"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="FloorArea"  class="col-sm-4 col-form-label">Floor Area(sqm)</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="FloorArea"  placeholder="60" onkeypress="return isNumberKey(event)"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="LeaseStarted"  class="col-sm-4 col-form-label">Lease Started</label>
					<div class="col-sm-8">
						<div class="input-group date">
							<input type="text" class="form-control" id="LeaseStarted"  placeholder="1986" onkeypress="return isNumberKey(event)"/>
							<div class="input-group-append">
								<span class="fa fa-calendar input-group-text" aria-hidden="true "></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="LeaseRemaining" class="col-sm-4 col-form-label" >Lease Remaining</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="LeaseRemaining"  placeholder="60" onkeypress="return isNumberKey(event)" />
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-primary" onclick="showValue()">Predict Price</button>
					</div>
				</div>
			</div>
		</div>
    </body>
    <script>
	$('#date').datepicker({ 
		format: 'yyyy-mm', 
		autoclose: true,
		viewMode: "months", 
		minViewMode: "months" 
	});
	$('#LeaseStarted').datepicker({ 
		format: 'yyyy', 
		autoclose: true,
		viewMode: "years", 
		minViewMode: "years" 
	});
	function showValue(){
        //TODO we load the model via tf.model.load then run a client-side predict to get the expected value.
		alert(	"date : " + $("#date").val() + "\n" +
				"Town : " + $("#town").val() + "\n" +
				"Flat Type : " + $("#flatType").val() + "\n" +
				"Flat Model : " + $("#flatModel").val() + "\n" +
				"Storey : " + $("#Storey").val() + "\n" +
				"Floor Area(sqm) : " + $("#FloorArea").val() + "\n" +
				"Lease Started : " + $("#LeaseStarted").val() + "\n" +
				"Lease Remaining : " + $("#LeaseRemaining").val() + "\n" 
			);
    }
	
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
    function predictPrice(){
        //TODO we load the model via tf.model.load then run a client-side predict to get the expected value.
		
    }
	
    </script>
</html>


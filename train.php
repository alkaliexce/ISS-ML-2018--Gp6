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
                <script src="PapaParse/papaparse.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.13.0"> </script>
        <script src="helpers.js"></script>
        <script src="preprocess_scripts.js"></script>
        <script src="tensorflow_scripts.js"></script>
    </head>
    <body>
<script>
  var data;
 
  function handleFileSelect(evt) {
    var file = evt.target.files[0];
 
    Papa.parse(file, {
      dynamicTyping: true,
      complete: function(results) {
          //remove the first row (headers)
        results.data.shift();
        //remove the last row (empty row)
        results.data.pop();
        //pre-process the array
        disp = preProcessArray(results.data);
        //train the model using pre-processed array and upload to server
        trainModel(getX(disp),getY(disp),15);
        alert('Trained model saved!');
      }
    });

    
  }
 
  $(document).ready(function(){
    $("#csv-file").change(handleFileSelect);
  });
</script>
<h1>Upload Data</h1>
<p>Here we can upload the dataset directly taken from data.gov</p>
Upload Data : <input type="file" id="csv-file" name="files" value = "Upload Data"/>

</html>

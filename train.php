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
        <script src="helpers.js"></script>
        <script src="scripts.js"></script>
    </head>
    <body>
<script>
  var data;
 
  function handleFileSelect(evt) {
    var file = evt.target.files[0];
 
    Papa.parse(file, {
      dynamicTyping: true,
      complete: function(results) {
        var tabl = document.getElementById("table1");
        results.data.shift();
        results.data.pop();
        disp = preProcessArray(results.data);
        disp.forEach(function(i){
            
        var row = tabl.insertRow(-1);
        var cell= row.insertCell(0);
        cell.innerHTML = i.toString()
        })
        
      }
    });
  }
 
  $(document).ready(function(){
    $("#csv-file").change(handleFileSelect);
  });
</script>
<input type="file" id="csv-file" name="files"/>
<p id="out"> TEXT HERE </p>
<table id="table1" border=1>
</table>
    </body>
</html>

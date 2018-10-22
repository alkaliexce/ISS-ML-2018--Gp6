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
        <script src="preprocess_scripts.js"></script>
        <script src="tensorflow_scripts.js"></script>
    </head>
    <body>
        <form>
            Date: <input placeholder="2018-01"/></br>
            Town: <input placeholder="Choose one"/></br>
            Flat Type: <input placeholder="Choose one"/></br>
            Storey: <input placeholder="10"/></br>
            Floor Area(sqm): <input placeholder="60"/></br>
            Flat Model: <input placeholder="Choose one"/></br>
            Lease Started: <input placeholder="1986"/></br>
            Lease Remaining: <input placeholder="60"/></br>
            <input type ="submit" value ="Predict Price" onclick="predictPrice()">
        </form>
    </body>
    <script>
    function predictPrice(){
        //TODO we load the model via tf.model.load then run a client-side predict to get the expected value.
    }
    </script>
</html>


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
    </head>
    <body>
        
        <a href ='onlinetrain.php'>Add data to Model (train on new data point)</a>
        </br>
        <a href='train.php'>Re-Train/Initialise Model (Upload a CSV and get a brand new model)</a>
         </br>
         <?php if (file_exists(__DIR__.'/model/model.json')&&file_exists(__DIR__.'/model/model.weights.bin')){?>
         Model Last Updated: <?php echo date("F d Y H:i:s.",filemtime(__DIR__.'/model/model.json')); ?> <a href='deleteModel.php' onclick="return confirm('Confirm Deletion of model?')">[Delete?]</a>
         <?php } else{?>
         No uploaded Model yet!
         <?php }?>
    </body>
</html>

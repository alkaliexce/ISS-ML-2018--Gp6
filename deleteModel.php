<?php
unlink(__DIR__.'/model/model.json');
unlink(__DIR__.'/model/model.weights.bin');
header('Location: admin.php');

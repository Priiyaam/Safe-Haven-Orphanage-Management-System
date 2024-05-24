<?php

$model = file_get_contents('polynomial_regression_model.pickle');
$lr = unserialize($model);

$id = 14; 
$profit = $lr->predict($poly->transform([[$id]])); 
echo "Predicted profit for ID $id: $profit";


//
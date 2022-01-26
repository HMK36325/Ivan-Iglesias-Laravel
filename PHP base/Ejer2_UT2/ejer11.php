<?php
$sumatorio=0;
for ($i = 1; $i <= 1000; $i++) {
    if ($i%2==0){
        $sumatorio=$sumatorio+$i;
    }
}

echo "La suma es: $sumatorio";
?>
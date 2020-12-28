<?php
$x = 10;
$A = [5,3,7,1,8,4];
echo var_dump($A);
for ($i = 0 ; $i < count($A) ; $i++) {
    echo $i. ": ". $A[$i]. "\n";
}

sort($A);

for ($i = 0 ; $i < count($A) ; $i++) {
    echo $i. ": ". $A[$i]. "\n";
}
   
?>
<?php
$output = [];
$returnVar = 0;
exec("composer dump-autoload", $output, $returnVar);
echo "Output:\n";
print_r($output);
?>
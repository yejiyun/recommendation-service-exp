<?php
$selectName = $_POST["selectName"];
$count = $_POST["count"];

try {
	$handle = fopen("result.txt", 'a');
	fwrite($handle, 'select['.$count.'] : '.$selectName."\n");
	fclose($handle);
} catch (Exception $e) {
	echo $e;
}

echo 'ok';
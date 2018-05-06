<?php
$fileContents = file_get_contents("test.txt");
$arrBuff = explode("\n", $fileContents);
$arrObjects = array();
for( $i = 0; $i < count($arrBuff); $i++){
	$strLine = $arrBuff[$i];
	$arrLine = explode(":", $strLine);
	$nIndex = $arrLine[0];
	$arrNumbers = explode(",", $arrLine[1]);
	$objLine = new stdClass();
	$objLine->index = $nIndex;
	$objLine->arrNumbers = $arrNumbers;
	array_push($arrObjects, $objLine);
}
$arrReturn = array();
for( $i = 0; $i < 10; $i ++){
	$obj = new stdClass();
	$obj->count = 0;
	$obj->Id = $i;
	$obj->arrNumbers = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	array_push($arrReturn, $obj);
}
for( $i = 0; $i < count($arrObjects); $i++){
	for( $j = 0; $j < count($arrReturn); $j++){
		if( $arrObjects[$i]->index == $arrReturn[$j]->Id){
			$arrReturn[$j]->count ++;
			for( $k = 0; $k < 15; $k++){
				$arrReturn[$j]->arrNumbers[$k] += (int)$arrObjects[$i]->arrNumbers[$k];
			}
		}
	}
}
for( $i = 0; $i < count($arrReturn); $i++){
	$temp = $arrReturn[$i];
	echo $temp->Id . ":" . $temp->count . "-";
	for( $j = 0; $j < 15; $j ++)
		echo $temp->arrNumbers[$j] . ",";
	echo "<br/>";
}
echo "<br/>";
echo "<br/>";

for( $i = 0; $i < count($arrReturn); $i++){
	$temp = $arrReturn[$i];
	echo $temp->Id . ":";
	for( $j = 0; $j < 15; $j ++){
		if( $temp->arrNumbers[$j] < $temp->count){
			echo "0,";
		} else if( $temp->arrNumbers[$j] < $temp->count * 6 / 4){
			echo "1,";
		} else{
			echo "2,";
		}
		// echo $temp->arrNumbers[$j] . ",";
	}
	echo "<br/>";
}
?>
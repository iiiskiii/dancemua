<?php
header("Content-Type: text/html; charset=UTF-8");

$param_arr = $_REQUEST["wr_2A"];
for($i=0 ; $i < count($param_arr) ; $i++){
	if($param_arr[$i] != ""){
		if($i == count($param_arr)-1){
			$wr_2 .= $param_arr[$i];
		}else{
			$wr_2 .= $param_arr[$i]."↕";
		}	
	}
}

$param_arr_wr_8A = $_REQUEST["wr_8A"];
$param_arr_wr_8B = $_REQUEST["wr_8B"];
$dateV = "";
for($y=0 ; $y < count($param_arr_wr_8A) ; $y++){
	if(($param_arr_wr_8A[$y] != "" ) && ($param_arr_wr_8B[$y] != "")){
		if($y == count($param_arr_wr_8A)-1){
			$dateV .= $param_arr_wr_8A[$y].$param_arr_wr_8B[$y];
		}else{
			$dateV .= $param_arr_wr_8A[$y].$param_arr_wr_8B[$y]."↕";
		}	
	}
}

$cdm_wr_8 = explode("↕",$dateV);
rsort($cdm_wr_8);
$cdm_wr_8A = count($cdm_wr_8);
for($m=0 ; $m < $cdm_wr_8A ; $m++){
	if($m == $cdm_wr_8A-1){
		$wr_8 .= $cdm_wr_8[$m];
	}else{
		$wr_8 .= $cdm_wr_8[$m]."↕";
	}	
}

sql_query("update $write_table set wr_1='$wr_1', wr_2='$wr_2', wr_3='$wr_3', wr_4='$wr_4', wr_5='$wr_5', wr_6='$wr_6', wr_7='$wr_7', wr_8='$wr_8', wr_9='$wr_9', wr_10='$wr_10' where wr_id='$wr_id' ");

?>
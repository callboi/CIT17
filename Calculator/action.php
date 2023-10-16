<?php
$currentValue = 0;

$input = [];


function getInputAsString($values){
	$o = "";
	foreach ($values as $value){
		$o .= $value;
	}
	return $o;
}


function calculateInput($userInput){
    // format user input
    $arr = [];
    $char = "";
    foreach ($userInput as $num){
        if(is_numeric($num) || $num == "."){
            $char .= $num;
        }else if(!is_numeric($num)){
            if(!empty($char)){
                $arr[] = $char;
                $char = "";
            }
            $arr[] = $num;
        }
    }
    if(!empty($char)){
        $arr[] = $char;
    }
    // calculate user input

    $current = 0;
    $action = null;
    for($i=0; $i<= count($arr)-1; $i++){
        if(is_numeric($arr[$i])){
            if($action){
                if($action == "+"){
                    $current = $current + $arr[$i];
                }
                if($action == "-"){
                    $current = $current - $arr[$i];
                }
                if($action == "x"){
                    $current = $current * $arr[$i];
                }
                if($action == "/"){
                    $current = $current / $arr[$i];
				}
				if($action == "%"){
                    $current = $current % $arr[$i];
				}
                $action = null;
            }else{
                if($current == 0){
                    $current = $arr[$i];
                }
            }
        }else{
            $action = $arr[$i];
        }
    }
    return $current;

}

$rep="";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['input'])){
        $input = json_decode($_POST['input']);
	}


    if(isset($_POST)){
		
        foreach ($_POST as $key=>$value){
			if($key == 'squareroot'){
				$currentValue = sqrt(floatval(getInputAsString($input)));
				$input = [];
				$input[] = $currentValue;
			 }
			 elseif($key == 'square'){
				$currentValue = pow(floatval(getInputAsString($input)),2);
				$input = [];
				$input[] = $currentValue;
			 }
            elseif($key == 'equal'){
               $currentValue = calculateInput($input);
               $input = [];
               $input[] = $currentValue;
            }elseif($key == "c"){
                $input = [];
                $currentValue = 0;
            }elseif($key == "back"){
                $lastPointer = count($input) -1;
                if(is_numeric($input[$lastPointer])){
                    array_pop($input);
                }
            }elseif($key != 'input'){
                $input[] = $value;
            }
        }
    }
}
?>
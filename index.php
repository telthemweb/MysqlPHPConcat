<?php

 require_once './inc/database.php';
function randomChars($str, $numChars){
    //Return the characters.
    return substr(str_shuffle($str), 0, $numChars);
}
 
 $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//Getting 1 random character.
$genChar= randomChars($string, 1);

// echo $genChar;
 



function generateCode($limit){
    $code = 0;
    for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
    return $code;
}

$genNumber= generateCode(7);

$ec_number = $genNumber.$genChar;

        $ecnum = $_POST['ec_num'];
		$emp_fname = $_POST['name'];

		$ecnum = $ec_number;
		$emp_fname = "Mike";


try {

	$sqlUser = "SELECT * FROM emp WHERE name = '".$emp_fname."'";
	$stmt = $conn->prepare($sqlUser);
	$stmt->execute();
	$numUsers = $stmt->rowCount();
	if($numUsers > 0) {
		echo (json_encode(array('Errmessage' => 'EC Number already Exist')));
		exit;
	}

	$stmt = $conn->prepare('INSERT INTO emp (ec_num,name) VALUES (:ec_num, :name)');
	$exeQuery = $stmt->execute(array(
	':ec_num' => $ecnum,
	':name' => $emp_fname
	));

	if($exeQuery){
		    
			echo "success";
			} 
			else{
				echo "Failed";
			}
	
}
catch(PDOException $e) {
echo $e->getMessage();
}





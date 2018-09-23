
<?php
function setData($dataSQL,$params){
	
	$pdo_host = 'localhost';
	$pdo_user = 'root';
	$pdo_pass = '';
	$pdo_database = 'test_db';
	
	//--------------------------------------------------------
	
	try {
	   $pdo_dns = 'mysql:host='.$pdo_host.';dbname='.$pdo_database;
		$pdo_db = new PDO($pdo_dns, $pdo_user, $pdo_pass);
		$pdo_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//------------------------------------------------------------------------------

		$pdo_sql = $pdo_db->prepare($dataSQL);
		$pdo_sql->execute($params);
		//return $pdo_sql->fetchAll(PDO::FETCH_ASSOC);
		$pdo_db = null; 
		echo "Connected successfully";
	}
	catch(PDOException $e)
	{
    echo "Connection failed: " . $e->getMessage();
    }
}


$name = htmlspecialchars($_POST["name"]); 
$age = htmlspecialchars($_POST["age"]); 
$job_title = htmlspecialchars($_POST["job_title"]); 
$inserted_on = htmlspecialchars($_POST["inserted_on"]); 
$last_updated = htmlspecialchars($_POST["last_updated"]); 

//var_dump($_POST);

//adding a new entry to "users_tbl"
$sql="INSERT INTO `users_tbl` ( `name`,`age`,`job_title`,`inserted_on`,`last_updated`) VALUES (?,?,?,?,?)";
$params = array($name, $age, $job_title, $inserted_on, $last_updated);    
$data = setData($sql,$params);




//
echo '<br />'.'New user '.$name.' has been added!'; 

   
?>


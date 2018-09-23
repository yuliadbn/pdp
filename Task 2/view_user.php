
<?php

function getData($dataSQL,$params){
	
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
		return $pdo_sql->fetchAll(PDO::FETCH_ASSOC);
		$pdo_db = null; 
		echo "Connected successfully";
	}
	catch(PDOException $e)
	{
    	echo "Connection failed: " . $e->getMessage();
    }
}

    // PDO SQL
    $sql = "SELECT `id_user`,`name`,`age`,`job_title`,`inserted_on`,`last_updated` FROM `users_tbl` WHERE `id_user`=?";
	$params = array(1);
	// Put results into $data
    $data = getData($sql,$params);
	
	var_dump($data);

		
	
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript">
	
</script>

<style type="text/css">
.nom{
	color: blue;
}
.ville{
	color: green;
}
.email{
	color: red;
}

.cle{
	font-weight: bold;
	text-transform: uppercase;
}	


</style>
</head>
<body>
<div class="container">
<?php

define('HOST', 'localhost');
define('USER', 'stouf');  
define('PASS', 'admin');
define('DB', 'mapetiteepicerie');

include_once('conectDB.php');
include_once('func_affiche_requ.php');

	//$query = $db->query('select * from utilisateurs');

	$query = $db->query('SELECT * 
FROM `utilisateurs` 
INNER JOIN login ON login.id_util = utilisateurs.`ID_util`
');

	tableau_result_fetch($query);


?>
</div>
</body>
</html>
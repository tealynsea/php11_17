<?php

session_start();

$code = 'DEN';

if(isset($_REQUEST['code'])) {
	$code = $_REQUEST['code'];
	$_SESSION['code'] = $code;
} else if(isset($_SESSION['code'])) {
	$code = $_SESSION['code'];
}

$result = file_get_contents('http://services.faa.gov/airport/status/'. $code .'?format=application/json');

$result = json_decode($result, true);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Title</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<h1><?php echo $result['name']; ?></h1>
		
		<form method="POST" action="/">
			CODE:  <input type="text" name="code" value="<?= $code ?>">
			<input type="submit" value="submit">
		</form>
	
	</body>

</html>

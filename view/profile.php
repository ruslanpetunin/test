<!DOCTYPE html>
<html>
<head>
	<title>Профиль</title>
</head>
<body>
<h1>Hello <?php echo $_SESSION['user'];?> </h1>
<a href="/test/controls/index.php?flag=true">exit</a>
<br>
<?php var_dump($_COOKIE['user']); var_dump($_SESSION['user']); ?>
</body>
</html>
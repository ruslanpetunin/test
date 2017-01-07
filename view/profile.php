<!DOCTYPE html>
<html>
<head>
	<title>Профиль</title>
	<link rel="stylesheet" type="text/css" href="/test/css/style.css">
</head>
<body>
<h1>Hello <?php echo $UserName;?> </h1>
<a href="/test/index.php?check_out=true">exit</a>
<br>
<hr>
<form method="POST" enctype="multipart/form-data" action="">
<input name="name_image" type='text' placeholder="Коментарий к изображению "><br><br>
<input type="file" name="image">
<input type="submit" value="upload">
</form>
<hr>
<table>

<?php 

$i=0;
	foreach ($Images as $key => $value) {
		if(($i)%3==0){echo '<tr>';}
		echo "<td><div><img class='galleryImage' src='".$value->path."'><br><p class='explanation'>".$value->name_image."</p></div></td>";
		if(($i+1)%3==0){echo '</tr>';}
		$i++;
	}

?>

</table>
</body>
</html>
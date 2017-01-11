<!DOCTYPE html>
<html>
<head>
	<title>Профиль</title>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/test/css/style.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fuild">
	<div class="row">
			<div class="col-md-1"><img src="/test/img/4.jpg" alt="Аватар" class="img-circle avatar"></div>
			<div class="col-md-4">
					<h1>Hello <?php echo $UserName;?> </h1>
					<a href="/test/index.php?check_out=true" class="MyExit" color="black"><span class="glyphicon glyphicon-log-out"></span> Exit</a>
			</div>
			<div class="col-md-3 col-md-offset-4">
					<form method="POST" class="navbar-form navbar-left" role="search" enctype="multipart/form-data" action="">
						<input type="file" name="image"><br>
						<input name="name_image" type='text' class="form-control" placeholder="Название изображения"><br>
						<input type="submit" class="btn btn-warning" value="upload">
					</form>
			</div>
	</div>
	<br><br>

<div class="container-fuild" id="main">
<div class="container center-block" id="content">
<table class="tableImage">

<?php 

$i=0;
	foreach ($Images as $key => $value) {
		if(($i)%4==0){echo '<tr>';}
		echo "<td><div><img class='galleryImage' src='".$value->path."'><br><p class='explanation'>".$value->name_image."</p></div></td>";
		if(($i+1)%4==0){echo '</tr>';}
		$i++;
	}

?>

</table>
</div>
</div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/test/css/style.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<title>Вход</title>
</head>
<body background="/test/img/fon.jpg">
<!--<form action="profile.php" method="POST">
<label>Логин</label>
<input type="text"  required>
<br><br>
<label>Пароль</label>
<input type="password" required>
<br><br>
<input type="submit">
</form>-->

<div class="container-fluid">

  <div class="container" id="my">
  	<h2 class="text-center">Авторизация</h2>
		<form class="navbar-form navbar-left center-block text-center" method="POST" action="/test/profile.php" role="search">
    		<input type="text" class="form-control" placeholder="Login" name="login"><br>
    		<input type="password" class="form-control" placeholder="Password" name="password"><br>
   			 <button type="submit" class="btn btn-default">Войти в систему</button>
  		</form>
  	<p class="text-center">Если вы у нас впервые, предлагаем вам <a>зарегистрироваться</a> и повторить попытку</p>
  	<h6 class="text-center">PetuninProduction©</h6>
  </div>
 </div>

</body>
</html>
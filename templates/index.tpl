<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{TITLE}}</title>
	<link rel="stylesheet" href="{{CSS}}">
</head>
<body>
<header>
	<div class="menu">
		{{MENU}}
		<form action="/login.php">
			<button class="auth">Войти</button>
		</form>
		<form action="/logout.php">
			<button class="auth">Выйти</button>
		</form>
	</div>
</header>
	<h1>{{H1}}</h1>
	<div>{{CONTENT}}</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
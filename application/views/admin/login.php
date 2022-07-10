<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body>
<div class="main">
	<div class="container b-container" id="b-container">
		<form class="form" id="b-form" method="post" action="<?=base_url()?>admin/login/login">
			<h2 class="form_title title">Đăng nhập</h2>
			<input class="form__input" type="text" name="username" required placeholder="Tên đăng nhập">
			<input class="form__input" type="password" name="password" required placeholder="Mật khẩu">
			<button type="submit" class="form__button button submit">Đăng nhập</button>
		</form>
	</div>
</div>
</body>
<style>
	*,
	*::after,
	*::before {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		user-select: none;
	}

	/* Generic */
	body {
		width: 100%;
		height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
		font-family: "Montserrat", sans-serif;
		font-size: 12px;
		background-color: #ecf0f3;
		color: #a0a5a8;
	}

	/**/
	.main {
		position: relative;
		min-width: 600px;
		min-height: 600px;
		height: 600px;
		padding: 25px;
		background-color: #ecf0f3;
		box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
		border-radius: 12px;
		overflow: hidden;
	}

	@media (max-width: 1200px) {
		.main {
			transform: scale(0.7);
		}
	}

	@media (max-width: 1000px) {
		.main {
			transform: scale(0.6);
		}
	}

	@media (max-width: 800px) {
		.main {
			transform: scale(0.5);
		}
	}

	@media (max-width: 600px) {
		.main {
			transform: scale(0.4);
		}
	}

	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		position: absolute;
		top: 0;
		width: 600px;
		height: 100%;
		padding: 25px;
		background-color: #ecf0f3;
		transition: 1.25s;
	}

	.form {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		width: 100%;
		height: 100%;
	}

	.form__input {
		width: 350px;
		height: 40px;
		margin: 4px 0;
		padding-left: 25px;
		font-size: 13px;
		letter-spacing: 0.15px;
		border: none;
		outline: none;
		font-family: "Montserrat", sans-serif;
		background-color: #ecf0f3;
		transition: 0.25s ease;
		border-radius: 8px;
		box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #f9f9f9;
	}

	.form__input:focus {
		box-shadow: inset 4px 4px 4px #d1d9e6, inset -4px -4px 4px #f9f9f9;
	}




	.title {
		position: absolute;
		top: 20px;
		font-size: 34px;
		font-weight: 700;
		line-height: 3;
		color: #181818;
	}


	.button {
		width: 180px;
		height: 50px;
		border-radius: 25px;
		margin-top: 50px;
		font-weight: 700;
		font-size: 14px;
		letter-spacing: 1.15px;
		background-color: #4b70e2;
		color: #f9f9f9;
		box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #f9f9f9;
		border: none;
		outline: none;
		transition: 0.25s ease;
	}

	.button:hover {
		width: 177px;
		height: 47px;
		transition: 0.25s ease;
	}

	.button:active {
		width: 175px;
		height: 45px;
		transition: 0.25s ease;
	}


	.b-container {
		left: calc(100% - 600px);
		z-index: 0;
	}
</style>

</html>

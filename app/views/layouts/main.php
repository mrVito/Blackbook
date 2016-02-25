<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Microcore</title>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
	<style type="text/css">
		* {
			font-family: "Source Sans Pro", sans-serif;
			font-weight: 200;
		}

		body {
			display: flex;
			flex: 1;
			align-content: center;
			justify-content: center;
		}

		h1 {
			font-size: 34pt;
		}

		hr {
			border: none;
			border-top: 1px solid #ddd;
		}

		.container {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Microcore is installed</h1>
		<?=place('content')?>
	</div>
</body>
</html>


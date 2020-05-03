<html>
	<head>
		<title>Login</title>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery-1.11.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/login.css"></link>
		<link rel="icon" href="image/logo.png">
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Marvel:400,100' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
		<link rel="icon" href="../image/logo.png">
	</head>
	<body>
	<?php echo form_open('login/aksi_login');?>
		<center>
			<div class="login">
					<span>SIMURAT</span>
			</div>
			<div class="kotak-login">
				<input type="text" class="username" name="username" id="username" placeholder="Username"></input>
				<input type="password" class="password" name="password" id="password" placeholder="Password"></input>
				<input type="submit" class="masuk" name="Login" value="Login"></input>
		    </div>
		</center>
	<?php echo form_close();?>
	</body>
</html>
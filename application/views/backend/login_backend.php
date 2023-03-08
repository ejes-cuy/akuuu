<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('backend/_partials/header'); ?>
	<title>Login</title>
    <style type="text/css">
 body{
	font-family: sans-serif;
	background: #0c2e8a;
}
 
h1{
	text-align: center;
	font-weight: 300;
}
 
.tulisan_login{
	text-align: center;
	text-transform: uppercase;
}
 
.kotak_login{
	width: 450px;
	background: white;
	margin: 80px auto;
	padding: 30px 20px;
	border-radius: 15px;
}
.kotak_login p{
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
	font-size: 13pt;
}
.
label{
	font-size: 11pt;
}

.form_login{
	box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
}
 
input[type="submit"] {
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #50d8af;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline-color: #78A529;
}

input[type="submit"]:hover {
    border-color: rgb(18, 29, 182);
    transition: .5s;
} 
.link{
	color: #232323;
	text-decoration: none;
	font-size: 10pt;
}
 
.alert{
	background: #e44e4e;
	color: white;
	padding: 10px;
	text-align: center;
	border:1px solid #b32929;
}
</style>
</head>
<body>
    
	<div class="kotak_login">
        <p>Lelang Perhiasan</p>
        <br>
		
		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form method="post" class="form">
			<label>Username</label>
			<input class="form-control" type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>" placeholder="Masukkan Username" value="<?= set_value('username') ?>" required>
			<div class="invalid-feedback">
					<?= form_error('username') ?>
		 	</div>
			
			<label>Password</label>
			<input class="form-control" type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>" placeholder="Masukkan Password" value="<?= set_value('password') ?>" required>
			<div class="invalid-feedback">
					<?= form_error('password') ?>
		 	</div>
			<input type="submit" name="login" value="Login">
 			<br/>
		</form>
		 
	</div>
 
 
</body>
</html>


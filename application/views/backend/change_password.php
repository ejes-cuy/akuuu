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

a[class="btn btn-secondary"] {
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: secondary;
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
        <p>Change Password</p>
        <br>
		
		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama"><strong>Nama User</strong></label>
                <input type="text" class="form-control" value="<?= $user->nama ?>" name="nama" readonly />
            </div>
                                <div class="form-group">
                                    <label for="username"><strong>Username</strong></label>
                                    <input type="text" class="form-control" value="<?= $user->username ?>" id="username" name="username" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current"><strong>Current Password</strong></label>
                                    <input type="password" class="form-control" id="current" name="current" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="password"><strong>Password Baru</strong></label>
                                    <input type="password" class="form-control" id="password" name="password" required maxlength="100">
                                </div>
                                
                                    <input type="submit" name="save" value="Update" id="save" >
                                    <a href="<?= site_url('backend/users'); ?>" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                
        </form>
        
		 
	</div>
 
 
</body>
</html>


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
        <p>Create an Account!</p> 
		<form method="post" class="form" enctype="multipart/form-data">
			<label>NIK</label>
			<input class="form-control" type="text" name="nik" placeholder="Masukkan NIK" required>
			 
			<label>Nama</label>
			<input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" required>
			
            <label>Jenis Kelamin</label> 
			<select name="jk" id="jk" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
			 
			<label>Alamat</label>
			<input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" required>
            
            <label>NO Kontak</label>
			<input class="form-control" type="text" name="no_hp" placeholder="Masukkan No Kontak" required>
			 
			<label>Email</label>
			<input class="form-control" type="text" name="email" placeholder="Masukkan Email" required>
            
            <label>Password</label>
			<input class="form-control" type="password" name="password" placeholder="Masukkan Password" required>
			  
			<div class="float-right">
                <a href="<?= site_url(' '); ?>" class="btn btn-dark"> Kembali </a>
                <button type="submit" id="save" value="save" class="btn btn-primary"> Registrasi Account</button>
            </div>
 			<br/>
		</form>
        
		 
	</div>
 
 
</body>
</html>


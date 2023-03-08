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
        <p>Data User</p>
        <br>
		
		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form method="post" class="form" enctype="multipart/form-data">
			<label>Email</label>
			<input class="form-control" type="text" name="email" readonly value="<?= $masyarakat->email ?>" required>

			<label>NIK</label>
			<input type="text" value="<?= $masyarakat->nik ?>" class="form-control" name="nik" required>
			 
			<label>Nama</label>
			<input type="text" value="<?= $masyarakat->nama ?>" class="form-control" name="nama" required>
			
            <label>Jenis Kelamin</label>
			<select name="jk" id="jk" class="form-control" required>
                <option value="Laki-laki" <?= ($masyarakat->jk == "Laki-laki") ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= ($masyarakat->jk == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
            </select>
			 
			<label>Alamat</label>
			<textarea class="form-control" name="alamat" required maxlength="250"><?= $masyarakat->alamat ?></textarea>

            <label>NO Kontak</label>
			<input type="text" value="<?= $masyarakat->no_hp ?>" class="form-control" name="no_hp" required> 

			<input type="submit" name="save" value="Update Data" id="save" >
			<a href="<?= site_url(''); ?>" class="btn btn-secondary">
            	Kembali
            </a>
 			<br/>
		</form>
        
		 
	</div>
 
 
</body>
</html>

<?php if ($this->session->flashdata('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>
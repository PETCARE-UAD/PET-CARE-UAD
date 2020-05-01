<html>
<head>
	<title>Form data diri</title>
	<style>
		body {
			margin:0;
			padding:0;
			display:flex;
			background-color:pink;
			justify-content:center;
			height:600px;
			align-items:center;
			font-family:sans-serif;
		}
		h1 {
			
		}
		input, select {
			border: 1px solid #CCCCCC;
			padding: 7px;
			font-size: 14px;
		}
		input[type="submit"] {
			padding: 7px 15px;
			margin-left: 10px;
			cursor: pointer;
		}
		label {
			width: 120px;
			display: block;
			float: left;
		}
		.checkbox, .radio {
			float:none;
			width: auto;
			
		}
		.row::after {
			content:"";
			display:block;
			clear:both;
			
		}
		.row {
			margin-bottom: 10px;
			clear: both;

		}
		.options {
			float:left;
		
		}
		.data{
			background-color:#fff;
			width:400px;
			text-align: center;
			padding:40px;
			box-sizing:border-box;
			border-radius:20px;}



	</style>
</head>
<body>
	<div class="data">
	<form action="" method="post">
	<center><h2>DATA DIRI</h2></center>
		<div class="row">
			<label>Nama</label>
			<input type="text" name="nama" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ''?>"/>
		</div>
		<div class="row">
			<label>Email</label>
			<input type="text" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>"/>
		</div>
		<div class="row">
			<label>No Telpon</label>
			<input type="text" name="no_telpon" value="<?=isset($_POST['no_telpon']) ? $_POST['no_telpon'] : ''?>"/>
		</div>
		<div class="row">
			<label>Lokasi</label>
			<select name="area">
				<?php $options = array('Jakarta', 'Semarang', 'Surakarta', 'Yogyakarta', 'Surabaya');
				foreach ($options as $area) {
					$selected = @$_POST['area'] == $area ? ' selected="selected"' : '';
					echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
				}?>
			</select>
		</div>
		<div class="row">
			<label>Jenis Kelamin</label>
			<div class="options">
				<?php
				$jenis_kelamin = array('L' => 'Laki Laki', 'P' => 'Perempuan');
				foreach ($jenis_kelamin as $kode => $detail) {
					$checked = @$_POST['jenis_kelamin'] == $kode ? ' checked="checked"' : '';
					echo '<label class="radio">
							<input name="jenis_kelamin" type="radio" value="' . $kode . '"' . $checked . '>' . $detail . '</option>
						</label>';
				}
				?>
		</div>
		</div>
		<div class="row">
			<input type="submit" name="submit" value="Simpan"/>
		</div>
		<?php
	if (isset($_POST['submit'])) {
		echo '<h6>Data Berhasil TersImpan</h6>';
	}?>
	</div>
	</form>
	
</body>
</html>

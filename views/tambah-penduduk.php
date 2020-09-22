<?php
include('header.php');
?>

<body>
    <div class="content">
      	<div class="card">
      		<div style="display: flex;width: 100%;flex-direction: row-reverse; margin-top: -10px;">	
      			<a href="index.php?controller=penduduk" style="flex-direction: row-reverse;"> 
      				<i class="fa fa-window-close fa-lg" aria-hidden="true" style="color: red"></i>
      			</a>
      		</div>
      		<h2 class="title" style="padding-bottom: 30px;">Tambah Data Penduduk</h2>
	      	<div id="card-content">

			<table>	
				<!-- Pilihan Isi -->
			  	<tr>
					<td style="text-align: left;">Tambah dengan</td>
					<td>:</td>
				  	<td style="text-align: left;"><select name="kode_kelas" onchange="changeForm(this)">
						<option value="nik">NIK</option>
						<option value="manual">Manual</option>
						</select></td>
				</tr>
			</table>

			<!-- Isi NIK-->
			<form method="post" action="index.php?controller=penduduk&create" id="form-nik">
			  	<table border="0">
			  		
			  		<tr>
				  		<td style="text-align: left;">No KK</td>
				  		<td>:</td>
					  	<td style="text-align: left;"><input name="no_kk" required placeholder="Isi No KK" style="width: 120px"></td>
				  	</tr>
				  	<tr>
				  		<td style="text-align: left;">NIK</td>
				  		<td>:</td>
					  	<td style="text-align: left;"><input name="nik" required placeholder="Isi NIK" style="width: 120px"></td>
				  	</tr>
				  	<tr>
				  		<td style="text-align: left;">Nama Penduduk</td>
				  		<td>:</td>
					  	<td style="text-align: left;"><input name="nama_penduduk" required placeholder="Isi Nama Penduduk" style="width: 200px"></td>
				  	</tr>
				  	<tr>
				  		<td style="text-align: left;">Satus Hubungan</td>
				  		<td>:</td>
					  	<td style="text-align: left;"><select name="id_hubungan" required>
						  	<option value="" style="display: none;">Pilih Status Hubungan</option>
						  	 <?php foreach($hubungan as $item): ?>	
							  <option value="<?=$item['id_hubungan'];?>"><?=$item['nama_hubungan']?></option>
							<?php endforeach; ?>	
							</select>
						</td>
				  	</tr>
				  	<tr>
				  		<td style="text-align: left;">No RT</td>
				  		<td>:</td>
					  	<td style="text-align: left;"><input name="no_rt" required placeholder="Isi No RT" style="width: 60px"></td>
				  	</tr>
				  	<tr>
				  		<td></td>
				  		<td></td>
				  		<td style="text-align: left;"><input type="submit" style="padding: 15px; background: #3282b8; color: white; border-width: 0px"/></td>
				  	</tr>
			  	</table>
			</form>
			 	
			<!-- Isi Manual -->
			<form method="post" action="index.php?controller=mahasiswa&create" id="form-manual" style="display: none;">
				<table border="0">
					<tr">
						<td style="text-align: left;">Nama Lengkap</td>
						<td>:</td>
						<td style="text-align: left;"><input name="nama_penduduk" required placeholder="Isi nama penduduk" style="width: 200px"></td>
					</tr>
					<tr>
						<td style="text-align: left;">Tanggal Lahir</td>
						<td>:</td>
						<td style="text-align: left;"><input type="date" id="tahun_masuk" name="tahun_masuk" min="2015-01" required style="width: 200px"></td>
					</tr>
					<tr>
						<td style="text-align: left;">Status Hubungan</td>
						<td>:</td>
						<td style="text-align: left;"><select name="id_hubungan" required>
						  	<option value="" style="display: none;">Pilih Status Hubungan</option>
						  	 <?php foreach($hubungan as $item): ?>	
							  <option value="<?=$item['id_hubungan'];?>"><?=$item['nama_hubungan']?></option>
							<?php endforeach; ?>	
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align: left;">No RT</td>
						<td>:</td>
						<td style="text-align: left;"><input name="no_rt" required placeholder="Isi No RT" style="width: 60px"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td style="text-align: left;"><input type="submit" style="padding: 15px; background: #3282b8; color: white; border-width: 0px"/></td>
					</tr>
				</table>
			</form>
			</div>
		</div>
    </div>
</body>

<script type="text/javascript">
  	window.onload = function() {
  		document.getElementById('form-manual').style.display = 'hidden';
	};

  	function changeForm(selectObject) {
	  	var value = selectObject.value;  
	  	console.log(value);
	  	if(value == 'nik'){
	  		document.getElementById("form-nik").style.display = "block";
	  		document.getElementById("form-manual").style.display = "none";
	  	}
	  	else{
	  		document.getElementById("form-nik").style.display = "none";
	  		document.getElementById("form-manual").style.display = "block";
	  	}
	}
</script>
</html>
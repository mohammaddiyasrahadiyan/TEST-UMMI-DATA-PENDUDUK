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
      		<h2 class="title" style="padding-bottom: 30px;">Edit Data Penduduk</h2>
	      	<div id="card-content">
			  	
			  	<!-- Edit Data Penduduk -->
			  	<form method="post" action="index.php?controller=penduduk&update">
			  		<table border="0">
			  			<tr>
			  				<td style="text-align: left;">Nomor Urut</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><?=$penduduk['id_penduduk'];?></td>
			  			</tr>
			  			<tr>
			  				<td style="text-align: left;">No KK</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><?=$penduduk['no_kk'];?></td>
			  			</tr>
			  			<tr>
			  				<td><input value="<?=$penduduk['id_penduduk'];?>" name="id" type="hidden"/></td>
			  			</tr>
			  			<tr>
			  				<td><input value="<?=$penduduk['id_penduduk'];?>" name="id_penduduk" type="hidden"/></td>
			  			</tr>
			  			<tr>
			  				<td style="text-align: left;">NIK</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><input value="<?=$penduduk['nik'];?>" name="nik" required placeholder="Isi NIK" style="width: 120px"></td>
			  			</tr>
			  			<tr>
			  				<td style="text-align: left;">Nama Lengkap</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><input value="<?=$penduduk['nama_penduduk'];?>" name="nama_penduduk" required placeholder="Isi Nama Penduduk" style="width: 200px"></td>
			  			</tr>
			  			<tr>
			  				<td style="text-align: left;">Tanggal Lahir</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><input value="<?=$penduduk['tahun_masuk']?>-01" type="date" id="tahun_masuk" name="tahun_masuk" min="2015-01" required style="width: 200px"></td>
			  			</tr>
			  			<tr>
			  				<td style="text-align: left;">Status Hubungan</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><select name="id_hubungan" required>
						  	 	<?php foreach($hubungan as $item): ?>	
							  	<option value="<?=$item['id_hubungan'];?>" 
							  	<?php if($penduduk['id_hubungan'] === $item['id_hubungan']){ echo "selected";}?>>
							  	<?=$item['nama_hubungan']?>
							  	</option>
								<?php endforeach; ?>	
								</select>
							</td>
			  			</tr>
			  			<tr>
			  				<td style="text-align: left;">No RT</td>
			  				<td>:</td>
			  				<td style="text-align: left;"><input value="<?=$penduduk['no_rt'];?>" name="no_rt" required placeholder="Isi No RT" style="width: 60px"></td>
			  			</tr>
			  			<tr>
			  				<td></td>
			  				<td></td>
			  				<td><input type="submit" style="padding: 15px; background: #3282b8; color: white; border-width: 0px"/></td>
			  			</tr>
			  		</table>
			  	</form>	
			</div>
		</div>
    </div>
</body>
</html>
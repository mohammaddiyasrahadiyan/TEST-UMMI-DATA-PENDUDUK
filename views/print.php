<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <meta charset = "UTF-8" />
    <title>Data Penduduk</title>
    <link href="assets/print.css" rel="stylesheet">
  </head>
  
  <body onload="window.print()">
    <div class="content">
      <h1 class="title">Data Penduduk Kota Sukabumi</h1>
      
      <div style="display:flex; flex-direction:left; width: 100%; height: 20px; align-items: center;">
        <small >Dibuat tanggal : <?=$date?></small> 
      </div>
      
      <table class="table" style="margin-top: 10px;">
        <tbody>
            <tr>
              <th width="5%">No</th>
              <th width="13%">No KK</th>
              <th width="20%">NIK</th>
              <th width="12%">Nama Penduduk</th>
              <th width="25%">Hubungan Keluarga</th>
              <th width="15%">No RT</th>
            </tr>
            
            <?php
              if ( !empty($penduduk) ) {
              $index = 1;
              foreach ($penduduk as $data): 
                $i = $data['id_penduduk']; 
            ?>
              
            <tr>
              <td scope="row"><?=$index; ?></td>
              <td scope="row"><?=$data['nik']; ?></td>
              <td><?=$data['nama_lengkap']; ?></td>
              <td><?=$data['no_rt']; ?></td>
              <td><?=$array[$i]; ?></td>
            </tr>
            
            <?php $index++; endforeach;
              } 
              else{ ?>

            <tr>
              <td colspan="7">Tidak ada data untuk ditampilkan.</td>
            </tr>
            
            <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
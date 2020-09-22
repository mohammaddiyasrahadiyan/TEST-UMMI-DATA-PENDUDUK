<?php
include('header.php');
?>
  <body>
    <div class="content">
      <h1 class="title">Data Penduduk Kota Sukabumi</h1>
      
      <div class="control" style="margin-top: 34px; ">
        <form method="post" target="_blank" action="index.php?controller=penduduk&print" style="display: flex;width: 90%;flex-direction: row; align-items: center; ">
          <button type="submit" class="button-link" style="margin-right: 10px;border-color: transparent;"> Print </button>
          <input style="width: 20%; max-height: 10px;" type="date" id="tahun_masuk" name="tahun_masuk" min="2015-01" required>
        </form>
        <a class="button-link" href="index.php?controller=penduduk&add"> Add </a>    
      </div>

      <br>
      
      <table border="1" class="table">
        <tbody>
            <tr>
              <th>No</th>
              <th>No KK</th>
              <th>NIK</th>
              <th>Nama Penduduk</th>
              <th>Status Hubungan</th>
              <th>No RT</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Jenis Kelamin</th>
              <th>Aksi</th>
            </tr>

            <?php
            if ( !empty($penduduk) ) {
            $index = 1;
            foreach ($penduduk as $data): 
            ?>
            
            <tr>
              <td><?=$index; ?></td>
              <td><?=$data['no_kk']; ?></td>
              <td><?=$data['nik']; ?></td>
              <td style="text-align: left;"><?=$data['nama_penduduk'];?></td>
              <td><?=$data['id_hubungan'];?></td>
              <td><?=$data['no_rt'];?></td>
              <td><?=$data['no_rt'];?></td>
              <td><?=$data['no_rt'];?></td>
              <td><?=$data['no_rt'];?></td>
              <td>
                  <a href="index.php?controller=penduduk&edit=<?php echo $data['id_penduduk']; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: green"></i></a>
                  <a onclick="if(!confirm('Anda akan menghapus data penduduk : <?=$data['id_penduduk']; ?>, lanjutkan ?')){ return false;}" href="index.php?controller=penduduk&delete=<?php echo $data['id_penduduk']; ?>"><i class="fa fa-ban fa-lg" aria-hidden="true" style="color: red"></i></a>
              </td>
            </tr>
            
            <?php $index++; endforeach;
            } else{ ?>
            <tr>
              <td colspan="4">Tidak ada data. Silahkan tambah data</td>
            </tr>
            
            <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
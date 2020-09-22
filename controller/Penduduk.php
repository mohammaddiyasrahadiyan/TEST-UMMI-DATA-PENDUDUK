<?php
//load dependencies
include 'config/config.php';
include_once('model/Penduduk_Model.php');
include_once('model/Hubungan_Model.php');
include_once('lib/Library.php');

$model_penduduk = new Penduduk_Model();
$model_hubungan = new Hubungan_Model(); 
$lib = new Library(); 

    //inisialisasi pages
    if (!isset($_GET['update']) && !isset($_GET['delete']) && !isset($_GET['create'])){
        if(isset($_GET['edit'])){
            $select = "tb_penduduk.*,tb_hubungan.*";
            $where = "INNER JOIN tb_hubungan ON tb_penduduk.id_hubungan = tb_hubungan.id_hubungan WHERE id_penduduk=".$_GET['edit'];
            $penduduk = $model_penduduk->get_by($select, $where);
            $hubungan = $model_hubungan->get();
            
            include('views/edit-penduduk.php');
        }

        else if (isset($_GET['add'])){
            $hubungan = $model_hubungan->get();
            include('views/tambah-penduduk.php');
        }

        else if (isset($_GET['print'])){
            $id_penduduk = explode("-", $_POST["id_penduduk"]);
            $select = "tb_penduduk.*,tb_hubungan.*";
            $where = "INNER JOIN tb_hubungan ON tb_penduduk.id_hubungan = tb_hubungan.id_hubungan WHERE id_penduduk=".$id_penduduk[0];
            $penduduk = $model_penduduk->print($select, $where);

            if($penduduk[0] == NULL){
                echo"<script type='text/javascript'>
                        alert('Tidak ada data yang dapat ditampilkan');
                        window.location.href = 'index.php?controller=penduduk';
                    </script>";
            }
            else{
                include('views/print.php');
            }   
        }
        else{
            $select = "SELECT * FROM tb_penduduk ORDER BY id_penduduk ASC";
            $penduduk = $model_penduduk->get($select);
            include('views/penduduk.php');
        }
    }

    //fungsi crud
    else if(isset($_GET['create']) && isset($_POST["id_penduduk"])){
        $array = str_split($_POST["id_penduduk"]);
        
        $_POST["no_kk"] = $array[1];
        $_POST["nik"] = $array[2];
        $_POST["nama_penduduk"] = $array[3];
        $_POST["id_hubungan"] = $array[4];
        $_POST["no_rt"] = $array[5];
        
        $validate = $lib->validate($_POST);
        if ($validate != 'valid'){
            echo"<script type='text/javascript'>
                    alert('$validate');
                    window.location.href = 'index.php?controller=penduduk&add';
                </script>";
        }
        else{
            $select = "id_hubungan";
            $where = "WHERE kode_hubungan='{$_POST["kode_hubungan"]}'";
            $hubungan = $model_hubungan->get_by($select, $where);
            
            $_POST["id_hubungan"] = $hubungan["id_hubungan"];
            unset($_POST["kode_hubungan"]);
            $data = $_POST;

            $response = $model_hubungan->create($data);
            if($response === true){
               echo "<script type='text/javascript'>
                        alert('Berhasil menyimpan data');
                        window.location.href='index.php?controller=penduduk';
                     </script>";
            } 
            else {
               echo "<script type='text/javascript'>
                        alert('gagal menyimpan data');
                        window.location.href='index.php?controller=penduduk&create';
                     </script>";
            }
        }
    }

    else if(isset($_GET['create'])){
        $validate = $lib->validate($_POST);

        if ($validate != 'valid'){
            echo"<script type='text/javascript'>
                    alert('$validate');
                    window.location.href = 'index.php?controller=penduduk&add';
                </script>";
        }
        else{
            $tahun = explode("-", $_POST["tahun_masuk"]);
            $nomorUrut = $lib->generateNo($tahun[0]);
            $nim = $lib->generateNIM(
                $tahun[0], 
                $_POST["kode_jenjang"],
                $_POST["id_prodi"], 
                $_POST["kode_kelas"], 
                $_POST["semester_masuk"],
                $nomorUrut,
            );

            $_POST["tahun_masuk"] = $tahun[0];
            $_POST["nomor_urut"] = $nomorUrut;
            $_POST["nim"] = $nim;

            $data = $_POST;

            $response = $model_penduduk->create($data);
            if($response === true){
                echo"<script type='text/javascript'>
                        alert('Berhasil menyimpan data');
                        window.location.href='index.php?controller=penduduk';
                    </script>";
            } 
            else{
                echo"<script type='text/javascript'>
                        alert('Gagal menyimpan data');
                        window.location.href='index.php?controller=penduduk&create';
                    </script>";
            }
        }
    }

    else if(isset($_GET['delete'])){
        $where = array("id_penduduk" => $_GET['delete']);
        $response = $model_penduduk->delete($where);
        if($response){
           echo "<script type='text/javascript'>
                    alert('Data Dihapus');
                    window.location.href='index.php?controller=penduduk';
                </script>";
        } 
        else {
           echo "<script type='text/javascript'>
                    alert('Gagal menghapus data');
                    window.location.href = 'index.php?controller=penduduk';
                </script>";
        }
    }

    else if(isset($_GET['update'])){
        $validate = $lib->validate($_POST);
        $id_penduduk = $_POST['id_penduduk'];
        $nomorUrut = $_POST['nomor_urut'];
        unset($_POST['id_penduduk']);
        unset($_POST['nomor_urut']);

        if ($validate != 'valid'){
            echo"<script type='text/javascript'>
                    alert('$validate');
                    window.location.href = 'index.php?controller=penduduk&edit='.$id;
                </script>";
        }
        else{
            $where_condition = array("id_penduduk" => $id_penduduk);

            $_POST["tahun_masuk"] = $tahun[0];
            $_POST["nik"] = $nik;
            $data = $_POST;

            $response =  $model_penduduk->update($data,$where_condition);
            if($response){
                echo"<script type='text/javascript'>
                        alert('Berhasil diubah');
                        window.location.href = 'index.php?controller=penduduk';
                    </script>";
            }
            else{
                echo"<script type='text/javascript'>
                        alert('perintah gagal');
                        window.location.href = 'index.php?controller=penduduk&edit='.$id;
                    </script>";
            }
        }
    }
?>
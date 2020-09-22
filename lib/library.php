<?php 
class Library{
	//load dependencies
	public function __construct(){
        include_once('model/Penduduk_Model.php');
        include_once('model/Hubungan_Model.php');
		$this->model_penduduk = new Penduduk_Model();
		$this->model_hubungan = new Hubungan_Model();
    }

    //validasi input
	public function validate($data_array){
		$message = 'valid';

		if(isset($data_array['nik'])){
			$nik = trim($data_array['nik']);

			if(strlen($nik) != 16 || !is_numeric($nik)){
				return $message = "Error NIK - NIK tidak valid";
			}

            $kode_hubungan = $data_array['kode_hubungan'];
			$queryHubungan = "WHERE kode_hubungan='{$kode_hubungan}'";
			$count_hubungan = $this->model_hubungan->count($queryHubungan);
			if($count_hubungan == 0){
            	return $message = "Error NIK - NIK tidak terdaftar";
            }

            $tahun = $data_array['tahun_masuk'];
            $nomorUrut = $data_array['nomor_urut'];
            $queryPenduduk = "WHERE tahun_masuk='{$tahun}' AND nomor_urut='{$nomorUrut}'";
            $count_penduduk = $this->model_penduduk->count($queryPenduduk);
            if($count_penduduk > 0){
            	return $message = "Error NIK - Penduduk sudah terdaftar";
            }
		}
		else{
			foreach ($data_array as $key => $value) {
				$value = trim($value);
				if(strlen($value) == 0 || empty($value)){
					$data = str_replace('_', ' ', $key);
					$msg  = str_replace('id_penduduk', '', $data);
					return $message = 'error - '.$msg.' masih kosong';
				}
			}
		}

		return $message;
	}

}
?>
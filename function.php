<?php

date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost", "root", "", "dompetyatim");

// ip
function get_client_ip()
{
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if (getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if (getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if (getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if (getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if (getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function convertDateDBtoIndo($string)
{
	// contoh : 2019-01-30

	$bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

	$tanggal 	= explode("-", $string)[2];
	$bulan 		= explode("-", $string)[1];
	$tahun 		= explode("-", $string)[0];

	return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
}

function RemoveSpecialChar($nom_acak)
{

	// Using str_replace() function 
	// to replace the word 
	$res = str_replace(array("#", "."), ' ', $nom_acak);


	// Returning the result 
	return $res;
}

function inisial($nama_inisial){
	$arr = explode(' ', $nama_inisial);
	$singkatan = '';
	foreach($arr as $kata)
	{
		$singkatan .= substr($kata, 0, 1);
	}
	return $singkatan;
}

function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 225;
    $resizeHeight = 225;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

function upload() {
	$file 		= $_FILES['gambar']['name'];
	$ukuran 	= $_FILES['gambar']['size'];
	$error 		= $_FILES['gambar']['error'];
	$tmpName 	= $_FILES['gambar']['tmp_name'];

	$uploadPath = '../img/profil/';

	
	// cek gambat

	if ($error === 4) {
		return false;
	}

	// cek gambar/bukan
	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensigambar = explode('.', $file); 
	$ekstensigambar = strtolower(end($ekstensigambar));

	if (!in_array($ekstensigambar, $ekstensigambarvalid) ) {
		echo "<script>

		alert('yang di upload bukan gambar');

			</script>";
			return false;
		
	}

	// cek ukuran terlalu bessar
	if ($ukuran>10000000) {
		echo "<script>

		alert('ukuran terlalu besar');

			</script>";
			return false;
		
	}

	$sourceProperties = getimagesize($tmpName);
	$uploadImageType = $sourceProperties[2];
	$sourceImageWidth = $sourceProperties[0];
	$sourceImageHeight = $sourceProperties[1];

	// generate nama batu gambar
	$namagambarbaru = uniqid();
	$namagambarbaru .='.';
	$namagambarbaru .= $ekstensigambar;

	switch ($uploadImageType) {
		case IMAGETYPE_JPEG:
			$resourceType = imagecreatefromjpeg($tmpName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagejpeg($imageLayer,$uploadPath."thump_".$namagambarbaru);
			break;

		case IMAGETYPE_JPG:
			$resourceType = imagecreatefromjpg($tmpName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagejpg($imageLayer,$uploadPath."thump_".$namagambarbaru);
			break;

		case IMAGETYPE_PNG:
			$resourceType = imagecreatefrompng($tmpName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagepng($imageLayer,$uploadPath."thump_".$namagambarbaru);
			break;
	}
	
	// die(var_dump($sourceImageHeight));

	 // siap di upload
	move_uploaded_file($tmpName,  $uploadPath . $namagambarbaru);
	

	return $namagambarbaru;

}

// bri
function donasi_bri($data) {

	global $conn;

	$link     	= htmlspecialchars($data["link"]);
	$jenis     	= htmlspecialchars($data["jenis"]);
	$nama     	= htmlspecialchars($data["nama"]);
	$nama_lain 	= htmlspecialchars($data["nama_lain"]);
	$hp 		= htmlspecialchars($data["hp"]);
	$deskripsi 	= htmlspecialchars($data["deskripsi"]);
	$donasi 	= htmlspecialchars($data["donasi"]);
	$donasi1 	= RemoveSpecialChar($donasi);
	$new_donasi	= str_replace(' ', '', $donasi1);
	$ip     	= get_client_ip();
	$date   	= date("Y-m-d H:i:s");
	$berakhir	= date('Y-m-d H:i:s',strtotime('+12 hour',strtotime($date)));


	$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$nama', '$ip',
	'$date', '$nama telah melakukan input donasi untuk $jenis')");

	// input data ke database
	$result = mysqli_query($conn, "INSERT INTO donasi VALUES('', '$link', '$jenis', '$nama', '$nama_lain', '$hp', '$deskripsi', '$new_donasi', '$date', '$berakhir', 'BRI', '', '', 'Pending' )");

	$id_terakhir = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

	foreach ($id_terakhir as $kd); 
	
	// die(var_dump($uangs));
	$kd_unik = $kd['id'];
	if ($kd_unik >= 999) {	
		$cek_kode = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

		foreach ($cek_kode as $new_kode);
		$id = $new_kode['id'];
        
		$kd_unik = substr($id,-3);
	}

	
	$harga 	= $new_donasi;
	$harga1 = substr($harga,3);
	$harga1 = (int) $harga;

	$Tdonasi = $harga1;

	$Tdonasi = substr($harga,0, -3);
	$kd_unik1 = sprintf('%03d',$kd_unik);
	
	$donasi_total = $Tdonasi.$kd_unik1;
	$harga3 = substr($donasi_total,3);
	$harga3 = str_replace(".","",$donasi_total);
	$harga4 = (int) $harga3;
	
	// die(var_dump($donasi_total));
	$update = mysqli_query($conn, "UPDATE `donasi` SET 
            `kode_unik`     ='$kd_unik',
            `jumlah_donasi`  ='$harga4' 
            WHERE id = $kd[id]"); 

	// die(var_dump($result));
	return mysqli_affected_rows($conn);

}

// bni
function donasi_bni($data) {

	global $conn;

	$link     	= htmlspecialchars($data["link"]);
	$jenis     	= htmlspecialchars($data["jenis"]);
	$nama     	= htmlspecialchars($data["nama"]);
	$nama_lain 	= htmlspecialchars($data["nama_lain"]);
	$hp 		= htmlspecialchars($data["hp"]);
	$deskripsi 	= htmlspecialchars($data["deskripsi"]);
	$donasi 	= htmlspecialchars($data["donasi"]);
	$donasi1 	= RemoveSpecialChar($donasi);
	$new_donasi	= str_replace(' ', '', $donasi1);
	$ip     	= get_client_ip();
	$date   	= date("Y-m-d H:i:s");
	$berakhir	= date('Y-m-d H:i:s',strtotime('+12 hour',strtotime($date)));


	$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$nama', '$ip',
	'$date', '$nama telah melakukan input donasi untuk $jenis')");

	// input data ke database
	$result = mysqli_query($conn, "INSERT INTO donasi VALUES('', '$link', '$jenis', '$nama', '$nama_lain', '$hp', '$deskripsi', '$new_donasi', '$date', '$berakhir', 'BNI', '', '', 'Pending' )");

	$id_terakhir = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

	foreach ($id_terakhir as $kd); 
	
	// die(var_dump($uangs));
	$kd_unik = $kd['id'];
	if ($kd_unik >= 999) {	
		$cek_kode = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

		foreach ($cek_kode as $new_kode);
		$id = $new_kode['id'];
        
		$kd_unik = substr($id,-3);
	}

	
	$harga 	= $new_donasi;
	$harga1 = substr($harga,3);
	$harga1 = (int) $harga;

	$Tdonasi = $harga1;

	$Tdonasi = substr($harga,0, -3);
	$kd_unik1 = sprintf('%03d',$kd_unik);
	
	$donasi_total = $Tdonasi.$kd_unik1;
	$harga3 = substr($donasi_total,3);
	$harga3 = str_replace(".","",$donasi_total);
	$harga4 = (int) $harga3;
	
	// die(var_dump($donasi_total));
	$update = mysqli_query($conn, "UPDATE `donasi` SET 
            `kode_unik`     ='$kd_unik',
            `jumlah_donasi`  ='$harga4' 
            WHERE id = $kd[id]"); 

	// die(var_dump($result));
	return mysqli_affected_rows($conn);

}

// qris
function donasi_qris($data) {

	global $conn;

	$link     	= htmlspecialchars($data["link"]);
	$jenis     	= htmlspecialchars($data["jenis"]);
	$nama     	= htmlspecialchars($data["nama"]);
	$nama_lain 	= htmlspecialchars($data["nama_lain"]);
	$hp 		= htmlspecialchars($data["hp"]);
	$deskripsi 	= htmlspecialchars($data["deskripsi"]);
	$donasi 	= htmlspecialchars($data["donasi"]);
	$donasi1 	= RemoveSpecialChar($donasi);
	$new_donasi	= str_replace(' ', '', $donasi1);
	$ip     	= get_client_ip();
	$date   	= date("Y-m-d H:i:s");
	$berakhir	= date('Y-m-d H:i:s',strtotime('+12 hour',strtotime($date)));


	$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$nama', '$ip',
	'$date', '$nama telah melakukan input donasi untuk $jenis')");

	// input data ke database
	$result = mysqli_query($conn, "INSERT INTO donasi VALUES('', '$link', '$jenis', '$nama', '$nama_lain', '$hp', '$deskripsi', '$new_donasi', '$date', '$berakhir', 'Qris', '', '', 'Pending' )");

	$id_terakhir = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

	foreach ($id_terakhir as $kd); 
	
	// die(var_dump($uangs));
	$kd_unik = $kd['id'];
	if ($kd_unik >= 999) {	
		$cek_kode = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

		foreach ($cek_kode as $new_kode);
		$id = $new_kode['id'];
        
		$kd_unik = substr($id,-3);
	}

	
	$harga 	= $new_donasi;
	$harga1 = substr($harga,3);
	$harga1 = (int) $harga;

	$Tdonasi = $harga1;

	$Tdonasi = substr($harga,0, -3);
	$kd_unik1 = sprintf('%03d',$kd_unik);
	
	$donasi_total = $Tdonasi.$kd_unik1;
	$harga3 = substr($donasi_total,3);
	$harga3 = str_replace(".","",$donasi_total);
	$harga4 = (int) $harga3;
	
	// die(var_dump($donasi_total));
	$update = mysqli_query($conn, "UPDATE `donasi` SET 
            `kode_unik`     ='$kd_unik',
            `jumlah_donasi`  ='$harga4' 
            WHERE id = $kd[id]"); 

	// die(var_dump($result));
	return mysqli_affected_rows($conn);

}

// otomatis
function donasi_va($data) {

	global $conn;

	$link     	= htmlspecialchars($data["link"]);
	$input     	= htmlspecialchars($data["input"]);
	$jenis     	= htmlspecialchars($data["jenis"]);
	$nama     	= htmlspecialchars($data["nama"]);
	$nama_lain 	= htmlspecialchars($data["nama_lain"]);
	$hp 		= htmlspecialchars($data["hp"]);
	$deskripsi 	= htmlspecialchars($data["deskripsi"]);
	$donasi 	= htmlspecialchars($data["donasi"]);
	$donasi1 	= RemoveSpecialChar($donasi);
	$new_donasi	= str_replace(' ', '', $donasi1);
	$ip     	= get_client_ip();
	$date   	= date("Y-m-d H:i:s");
	$berakhir	= date('Y-m-d H:i:s',strtotime('+12 hour',strtotime($date)));

	$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$nama', '$ip',
	'$date', '$nama telah melakukan input donasi untuk $jenis')");

	// input data ke database
	$result = mysqli_query($conn, "INSERT INTO donasi VALUES('', '$link', '$jenis', '$nama', '$nama_lain', '$hp', '$deskripsi', '$new_donasi', '$date', '$berakhir', '$input', '', '', 'Pending' )");

	$id_terakhir = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

	foreach ($id_terakhir as $kd); 
	
	// die(var_dump($uangs));
	$kd_unik = $kd['id'];
	if ($kd_unik >= 999) {	
		$cek_kode = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

		foreach ($cek_kode as $new_kode);
		$id = $new_kode['id'];
        
		$kd_unik = substr($id,-3);
	}

	
	$harga 	= $new_donasi;
	$harga1 = substr($harga,3);
	$harga1 = (int) $harga;

	$Tdonasi = $harga1;

	$Tdonasi = substr($harga,0, -3);
	$kd_unik1 = sprintf('%03d',$kd_unik);
	
	$donasi_total = $Tdonasi.$kd_unik1;
	$harga3 = substr($donasi_total,3);
	$harga3 = str_replace(".","",$donasi_total);
	$harga4 = (int) $harga3;
	
	// die(var_dump($donasi_total));
	$update = mysqli_query($conn, "UPDATE `donasi` SET 
            `kode_unik`     ='$kd_unik',
            `jumlah_donasi`  ='$harga4' 
            WHERE id = $kd[id]"); 

	// die(var_dump($result));
	return mysqli_affected_rows($conn);

}
?>
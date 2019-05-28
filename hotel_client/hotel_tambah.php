<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/hotel_api/api/hotel/tambah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil ditambah...!!');window.location.href=\"http://localhost/hotel_client/hotel.php\";</script>";
	}else{
		
		// print_r($_POST);
		// echo "Fafa";

		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api ?>
<h3>Tambah Data HOtel</h3>
<form class="form-horizontal" method="POST" action="http://localhost/hotel_client/hotel_tambah.php">
	Nama hotel* <br/>
	<input type="text" placeholder="Nama hotel" name="nama_hotel" required/><br/>
	tempat* <br/>
	<input type="text" placeholder="tempat" name="tempat" required/><br/>
	harga* <br/>
	<input type="text" placeholder="harga" name="harga" required/><br/>
	<button type="submit" type="button">
		Submit
	</button>
</form>
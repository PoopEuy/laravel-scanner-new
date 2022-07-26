<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['file_excell']['name']) ;
move_uploaded_file($_FILES['file_excell']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['file_excell']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['file_excell']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$capa_grad     = $data->val($i, 1);
	$cell_sern   = $data->val($i, 2);
	$crtn_sern  = $data->val($i, 3);
	$m  = $data->val($i, 4);
	$c_po  = $data->val($i, 5);
	$v_po  = $data->val($i, 6);
	$ir_po  = $data->val($i, 7);
	$k  = $data->val($i, 8);
	$w  = $data->val($i, 9);
	$ha  = $data->val($i, 10);
	$hc  = $data->val($i, 11);
	$t  = $data->val($i, 12);
	// $bin  = $data->val($i, 13);
	// $data_v  = $data->val($i, 14);
	// $data_ir  = $data->val($i, 15);
	// $data_sn  = $data->val($i, 16);
	// $data_cell  = $data->val($i, 17);

	$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$timestamp = $dt->format('Y-m-d G:i:s');
	$created_at  = $timestamp;
	$updated_at  = $timestamp;

	if($c_po >= 299.001){
	$bin = 1;
	}else if($c_po >= 298.001){
	$bin = 2;
	}else if($c_po >= 297.001){
	$bin = 3;
	}

	if($cell_sern != "" && $crtn_sern != "" && $created_at != ""){
		// input data ke database (table data_pegawai)
		// echo 'barcode : '.$kd_brcd."<br>\n";
		// echo 'kd_levl : '.$kd_levl."<br>\n";
		// echo 'no_crtn : '.$no_crtn."<br>\n";
		// echo 'dc_capa : '.$dc_capa."<br>\n";
		// echo 'oc_time : '.$oc_time."<br>\n";
		// echo 'oc_volt : '.$oc_volt."<br>\n";
		// echo 'nl_rest : '.$nl_rest."<br>\n";
		// echo 'nl_thic : '.$nl_thic."<br>\n";



		// pg_query($db_conn,"INSERT into m_batt values('$capa_grad','$cell_sern','$crtn_sern','$m','$c_po','$v_po','$ir_po','$k','$w','$ha','hc')");
		// $berhasil++;

		pg_query($db_conn,"INSERT into m_batt (cell_sern, capa_grad, crtn_sern, m, c_po, v_po, ir_po, k, w, ha, hc, t, bin, created_at, updated_at) values ('$cell_sern','$capa_grad','$crtn_sern','$m','$c_po','$v_po','$ir_po','$k','$w','$ha','$hc','$t','$bin','$created_at','$updated_at')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['file_excell']['name']);

// alihkan halaman ke index.php
// header("location:index.php?berhasil=$berhasil");
?>
<?php
if (!empty($_GET['sub'])){
	if (ctype_digit($_GET['sub'])) {
		include '../../config/koneksi.php';
		$query = mysql_query("SELECT * FROM subcategory where id_category=$_GET[sub] order by id_subcategory");
		echo"<option selected value=''>Pilih Subcategory</option>";
		while($d = mysql_fetch_array($query)){
			echo "<option value='$d[id_subcategory]'>$d[subcategory_name]</option>";
		}


	}
}

if (!empty($_GET['brand'])){
		if (ctype_digit($_GET['brand'])) {
		include '../../config/koneksi.php';
			$query = mysql_query("SELECT * FROM brand where id_subcategory=$_GET[brand] order by id_brand");
			echo"<option selected value=''>Pilih Brand</option>";
			while($d = mysql_fetch_array($query)){
				echo "<option value='$d[id_brand]'>$d[brand_name]</option>";
			}
		}
	}

?>

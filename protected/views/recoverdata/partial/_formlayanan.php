<?php 

echo "<option>-- Pilih Versi --</option>";
if(isset($dataLayanan)){
	foreach ($dataLayanan as $key) {
		echo "<option value=\"".$key->id."\">".$key->nama_layanan."</option>\n";
	}
}

 ?>
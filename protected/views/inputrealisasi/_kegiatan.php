<?php 

echo "<option>-- Pilih Kegiatan --</option>";
if(isset($dataKegiatan)){
	foreach ($dataKegiatan as $key) {
		echo "<option value=\"".$key->id."\">".$key->nama_kegiatan."</option>\n";
	}
}

 ?>
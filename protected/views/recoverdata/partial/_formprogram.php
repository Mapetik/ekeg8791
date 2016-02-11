<?php 

echo "<option>-- Pilih Program --</option>";
if(isset($dataProgram)){
	foreach ($dataProgram as $key) {
		echo "<option value=\"".$key->id."\">".$key->nama_program."</option>\n";
	}
}

 ?>
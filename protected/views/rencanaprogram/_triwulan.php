<table class="table table-bordered">
	<tr>
		<td>Jumlah Kegiatan</td>
		<td>Tahun Anggaran</td>
	</tr>
	<tr>
		<td><?php echo count($dataKegiatan) ?></td>
	</tr>
</table>

<!-- // Tabel Daftar Program -->
<table class="table table-striped table-bordered">
	<?php if (count($dataKegiatan)>0){ ?>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Nama Kegiatan</th>
		<?php 
			for($i=$min;$i<=$max;$i++) {
				echo "<th>".date('M',mktime(0,0,0,$i+1,0,0))."</th>";
			}
		?>
	</tr>	

	<?php }else{ ?>
	<div class="col-md-12 alert alert-danger">
		Maaf Data Kosong pada Triwulan ini <b></b>
	</div>
	<?php } ?>
	
	<?php $no = 1; ?>
	<?php foreach ($dataKegiatan as $key): ?>
		<tr>
			<td><?php echo $no;$no++; ?></td>
			<td><?php echo $key['kode_kegiatan'] ?></td>
			<td><?php echo $key['nama_kegiatan'] ?></td>
			<?php 
			for($i=$min;$i<=$max;$i++) {
				if($i == $key['bulan']) $class = "alert-danger"; else {$class=" ";}
				echo "<td class=$class></td>";
			}
			?>
		</tr>
	<?php endforeach; ?>
</table>
<!-- HIGHCHART -->
<script  src="<?php echo Yii::app()->request->baseUrl; ?>/assets/highchart/highcharts.js"></script>
<h1>Target</h1>
<?php 
$this->Widget('ext.highcharts.highcharts.HighchartsWidget', array(
   'options'=>'{
      "title": { "text": "Sebaran Realisasi Satu Kegiatan" },
      "xAxis": {
         "categories": ["Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Desember"]
      },
      "yAxis": {
         "title": { "text": "Fruit eaten" }
      },
      "series": [
         { "name": "Kegiatan", "data": ['.$dataTargetProgram.'] }
      ]
   }'
));

 ?>
<h1>Realisasi</h1>
<?php 

$this->Widget('ext.highcharts.highcharts.HighchartsWidget', array(
   'options'=>'{
      "title": { "text": "Sebaran Realisasi Satu Kegiatan" },
      "xAxis": {
         "categories": ["Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Desember"]
      },
      "yAxis": {
         "title": { "text": "Fruit eaten" }
      },
      "series": [
         { "name": "Kegiatan", "data": ['.$dataKegiatan.'] }
      ]
   }'
));

$this->Widget('ext.highcharts.highcharts.HighchartsWidget', array(
   'options'=>'{
      "title": { "text": "Sebaran Realisasi Satu Layanan" },
      "xAxis": {
         "categories": ["Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Desember"]
      },
      "yAxis": {
         "title": { "text": "Fruit eaten" }
      },
      "series": [
         { "name": "'.$layanan.'", "data": ['.$data.'] }
      ]
   }'
));
$this->Widget('ext.highcharts.highcharts.HighchartsWidget', array(
   'options'=>'{
      "title": { "text": "Sebaran Realisasi Satu Program" },
      "xAxis": {
         "categories": ["Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Desember"]
      },
      "yAxis": {
         "title": { "text": "Fruit eaten" }
      },
      "series": [
         { "name": "Program", "data": ['.$dataProgram.'] }
      ]
   }'
));


$this->Widget('ext.highcharts.highcharts.HighchartsWidget', array(
   'options'=>'{
      "title": { "text": "Sebaran Realisasi Satu Seluruh Program" },
      "xAxis": {
         "categories": ["Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Desember"]
      },
      "yAxis": {
         "title": { "text": "Fruit eaten" }
      },
      "series": [
         { "name": "Program", "data": ['.$dataSeluruh.'] }
      ]
   }'
));

 ?>
<script src="./chartjs/Chart.js"></script>
<div style="width:100%">
    <div>
        <canvas id="canvas" height="550" width="1000"></canvas>
    </div>
</div>

<script>
    var lineChartData = {
        labels : ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
        datasets : [
            {
                label: "My First dataset",
                fillColor : "rgba(220,220,220,0.2)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
                data : [
                    <?php 
                    $i=0;
                    foreach ($dataChart as $key) {
                        echo $key.",";
                    }
                     ?>
                ]
            },
        ]

    }

window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = new Chart(ctx).Line(lineChartData, {
        responsive: true
    });
}
</script>
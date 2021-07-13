<?php
if ( array_sum($argv['answeredQuests']['data']) > 0 ){
    ?>
    <div class="row">
        <div class="col-md-12">
            <canvas id="myChartAnsweredQuests" height="50%"></canvas>
        </div>
    </div>
    <script src="ui/plugins/chart.js/Chart.js"></script>
    <script>
        var ctx = $('#myChartAnsweredQuests');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?=json_encode($argv['answeredQuests']['label'])?>,
                datasets: [{
                    label: '# of Answers',
                    backgroundColor: "rgba(100,149,237,0.4)",
                    borderColor: "rgba(100,149,237,1)",
                    data: <?=json_encode($argv['answeredQuests']['data'])?>,
                    borderWidth: 1
                }]
            },
            options: {
                legend:{
                    display: false
                },
                scales: {
                    xAxes: [{
                        min: 0,
                        gridLines: {
                            display:false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display:false
                        },
                        ticks: {
                            display:false
                        }
                    }]
                },
            },
            maintainAspectRatio: false,
            responsive: true
        });
    </script>
    <?php
} else {
    ?>
    <div class="callout callout-warning">
        <div class="row">
            <div class="col-md-12">
                <h5>You didn't answer any quest yet</h5>
            </div>
        </div>
    </div>
    <?php
}
?>


<?php
if ( count($argv['quests']) > 0 ){
    if ( $argv['data'][0] > 0 ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <canvas id="myChartMostAnswered" height="90%"></canvas>
            </div>
        </div>
        <script src="ui/plugins/chart.js/Chart.js"></script>
        <script>
            var ctx = $('#myChartMostAnswered');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?=json_encode($argv['labels'])?>,
                    datasets: [{
                        label: "Population (millions)",
                        backgroundColor: <?=json_encode($argv['backgroundColors'])?>,
                        data: <?=json_encode($argv['data'])?>
                    }]
                },
                options: {
                    legend: {
                        position: "right"
                    }
                }
            });
        </script>
        <?php
    } else {
        ?>
        <div class="callout callout-warning">
            <div class="row">
                <div class="col-md-12">
                    <h5>You don't have any answers yet</h5>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="callout callout-warning">
        <div class="row">
            <div class="col-md-12">
                <h5>You don't have any quests created yet</h5>
            </div>
        </div>
    </div>
    <?php
}
?>


<?php
    if ( count($argv['answers']) > 0 ){
        if ( array_sum($argv['answers']) > 0 ){
            ?>
            <div class="row">
                <div class="col-md-12">
                    <canvas id="myChartAnswersReceived" height="50%"></canvas>
                </div>
            </div>
            <script src="ui/plugins/chart.js/Chart.js"></script>
            <script>
                var ctx = $('#myChartAnswersReceived');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?=json_encode(array_keys($argv['answers']))?>,
                        datasets: [{
                            label: '# of Answers',
                            backgroundColor: "rgba(100,149,237,0.4)",
                            borderColor: "rgba(100,149,237,1)",
                            data: ['<?=implode("' , '", $argv['answers'])?>'],
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
                    <a href="/quest/create" class="btn btn-outline-success"><i class="fas fa-scroll fa-fw"></i> Create your first quest!</a>
                </div>
            </div>
        </div>
        <?php
    }
?>


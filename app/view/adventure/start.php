<?php $this->loadView('login/_header',$argv); ?>

<!-- Ion Slider -->
<link rel="stylesheet" href="/ui/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<script src="/ui/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- daterange picker -->
<script src="/ui/plugins/moment/moment.min.js"></script>
<link rel="stylesheet" href="/ui/plugins/daterangepicker/daterangepicker.css">
<script src="/ui/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2-->
<link rel="stylesheet" href="/ui/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/ui/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="/ui/plugins/select2/js/select2.full.min.js"></script>

<body class="mt-5" style="background: #e9ecef; display: -ms-flexbox; display: flex; height: 100vh; -ms-flex-pack: center; justify-content: center;">
    <div class="login-box" style="width: 50% !important">
        <form action="/adventure/start/<?=$argv['quest']['code']?>" method="post" id="formQuest">
            <input type="hidden" name="focus" id="focus" value="0">
            <div class="card">
                <div class="card-header">
                    <?=$argv['quest']['name']?>
                </div>
                <div class="card-body login-card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $iterator = 1;
                            foreach ( $argv['questions'] as $key => $question ){
                                $this->loadView('quest/question/'.@$question['questionType'], array(
                                    'key' => $key,
                                    'iterator' => $iterator,
                                    'question' => $question,
                                    'error' => @$argv['error'][$key],
                                    'value' => @$argv['post'][$key]
                                ));
                                $iterator++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <a id="btnFinish" href="" class="btn btn-outline-success btn-sm"><i class="fa fa-check-circle fa-fw"></i> Finish</a>
            </div>
        </form>
    </div>
</body>

<script>
    $('#btnFinish').click(function(){
        $('#focus').val(parseInt($('#focus').val())-1)
        window.onbeforeunload = function(){
            return 'Are you sure you answered all the questions?';
        };
        $('#formQuest').submit();
        return false;
    });

    window.onbeforeunload = confirmExit;


    window.onfocus = function() {
        $('#focus').val(parseInt($('#focus').val())+1)
    }


    function confirmExit(){
        $('#focus').val(parseInt($('#focus').val())-1)
        $.ajax({
            url: '/adventure/ajax/leave',
        });
        return "You have attempted to leave this page.  Your changes will be lost.  Are you sure you want to exit this page?";
    }
</script>

<?php $this->loadView('login/_footer',$argv); ?>
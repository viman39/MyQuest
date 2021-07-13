<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-hat-wizard fa-fw"></i> Quest Creator
        </h1>
    </div>
</section>

<section class="content">
    <?php
    //__sys_console($argv['post'])
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/quest/create/questionnaire" method="post" id="formQuestions">
                    <input type="hidden" name="submitPost" value="questionnaire">
                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            <?php
                            $this->loadView('quest/create/menu', array(
                                'menu' => 'questions'
                            ));
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" id="questionnaire-body">
                                    <?php
                                    $this->loadView('quest/quest', $argv);
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button id="add-question-button" class="btn btn-block btn-outline-success col-md-6"><i class="fas fa-plus-circle fa-fw"></i> Add Question</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer with-border">
                            <a href="/quest/create/cancel" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/quest/create/cancel"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
                            <a href="/quest/create/index" id="btnBack" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw"></i> Back</a>
                            <a id="btnNext" href="/quest/create/questionnaire" class="btn bg-gradient-primary btn-sm text-white"><i class="fa fa-arrow-circle-right fa-fw"></i> Next</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    $this->loadView('quest/modal-question')
?>

<script>
    <?php
        if ( isset($argv['error']['questions']) ){
            ?>
                toastr.error('<?=$argv['error']['questions']?>')
            <?php
        }
    ?>

    $('#btnNext').click(function(){
        $('#btnCancel').addClass('disabled');
        $('#btnNext').addClass('disabled');
        $('#formQuestions').submit();
        return false;
    });

    function deleteQuestion(questionId){
        $.ajax({
            url: '/quest/ajax/delete-question',
            type: 'POST',
            data: {
                'questionId'          : questionId,
            },
        }).done(function(response){
            $('#questionnaire-body').html(response);
        });

        return false;
    }
</script>

<?php $this->loadView('_footer', $argv);?>

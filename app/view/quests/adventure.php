<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-dragon fa-fw"></i> Quest
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/quests/begin/<?=$argv['quest']['id']?>" method="post" id="formQuest">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h4><?=$argv['quest']['name']?></h4>
                        </div>
                        <div class="card-body">
                            <?php
                            $this->loadView('quest/quest', $argv)
                            ?>
                        </div>
                        <div class="card-footer">
                            <a href="/quests" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/quests"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
                            <a id="btnFinish" href="" class="btn btn-success btn-sm text-white text-right"><i class="fa fa-check-circle fa-fw"></i> Finish</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#btnFinish').click(function(){
            $('#btnFinish').addClass('disabled');
            $('#btnCancel').addClass('disabled');
            $('#formQuest').submit();
            return false;
        });
    });
</script>
<?php $this->loadView('_footer', $argv);?>


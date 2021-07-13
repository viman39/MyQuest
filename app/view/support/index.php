<?php $this->loadView('_header', $argv)?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-info fa-fw"></i> Support
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <form method="post" action="/support" id="formLanguage">
                        <div class="card-header">
                            <h3 class="card-title">Support</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input class="form-control form-control-sm <?=isset($argv['error']['subject']) ? 'is-invalid' : ''?>" type="text" name="subject" value="<?=( ( isset($argv['post']['subject']) ? $argv['post']['subject'] : '' ) )?>">
                                        <?=( ( isset($argv['error']['subject']) ) ? '<small class="text-red">'.$argv['error']['subject'].'</small>' : '' )?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="body">Question </label>
                                        <textarea name="body" class="form-control form-control-sm <?=isset($argv['error']['body']) ? 'is-invalid' : ''?>" rows="5"><?=( ( isset($argv['post']['body']) ) ? $argv['post']['body'] : '' )?></textarea>
                                        <?=( ( isset($argv['error']['body']) ) ? '<small class="text-red">'.$argv['error']['body'].'</small>' : '' )?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/dashboard" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/dashboard"><i class="fas fa-times-circle fa-fw"></i> Cancel</a>
                            <a href="/support" id="btnSubmit" class="btn bg-gradient-success btn-sm"><i class="fa fa-paper-plane fa-fw"></i> Send</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){

        $('#btnSubmit').click(function(){
            $('#btnCancel').addClass('disabled');
            $('#btnSubmit').addClass('disabled');
            $('#formLanguage').submit();
            return false;
        });

    });
</script>


<?php $this->loadView('_footer', $argv)?>

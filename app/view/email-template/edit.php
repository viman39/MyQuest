<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-envelope fa-fw"></i> <?=$txtEditEmailTemplate?>
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/email_template/edit/<?=$argv['emailTemplate']['id']?>" method="post" id="frmTemplate">
                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            <?=$txtEditEmailTemplate?>
                        </div>
                        <div class="card-body">
                            <?php
//                                                            __sys_console($argv)
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                        $usedFor = $argv['emailTemplate']['usedFor'];

                                        if ( isset($argv['post']['usedFor']) ){
                                            $usedFor = $argv['post']['usedFor'];
                                        }
                                        ?>
                                        <label for="name"><?=$txtUsedFor?> <span class="text-red">*</span></label>
                                        <input class="form-control form-control-sm <?=isset($argv['error']['usedFor']) ? 'is-invalid' : ''?>" type="text" name="usedFor" value="<?=$usedFor?>">
                                        <?=( ( isset($argv['error']['usedFor']) ) ? '<small class="text-red">'.$argv['error']['usedFor'].'</small>' : '' )?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                        $name = $argv['emailTemplate']['name'];

                                        if ( isset($argv['post']['name']) ){
                                            $name = $argv['post']['name'];
                                        }
                                        ?>
                                        <label for="name"><?=$txtName?> <span class="text-red">*</span></label>
                                        <input class="form-control form-control-sm <?=isset($argv['error']['name']) ? 'is-invalid' : ''?>" type="text" name="name" value="<?=$name?>">
                                        <?=( ( isset($argv['error']['name']) ) ? '<small class="text-red">'.$argv['error']['name'].'</small>' : '' )?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                        $details = '';

                                        if ( isset($argv['emailTemplate']['details']) ){
                                            $details = $argv['emailTemplate']['details'];
                                        }

                                        if ( isset($argv['post']['name']) ){
                                            $details = $argv['post']['details'];
                                        }
                                        ?>
                                        <label for="details"><?=$txtDetails?> </label>
                                        <textarea name="details" class="form-control form-control-sm <?=isset($argv['error']['details']) ? 'is-invalid' : ''?>" ><?=$details?></textarea>
                                        <?=( ( isset($argv['error']['details']) ) ? '<small class="text-red">'.$argv['error']['details'].'</small>' : '' )?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php
                                foreach ( $argv['langs'] as $lang ){
                                    ?>
                                    <div class="col-md-4">
                                        <p><i class="flag-icon flag-icon-<?=$lang['flag']?>"></i> <?=$lang['name']?></p>
                                        <input type="hidden" name="template[<?=$lang['id']?>][lang]" value="<?=$lang['name']?>">
                                        <input type="hidden" name="template[<?=$lang['id']?>][code]" value="<?=$lang['code']?>">
                                        <input type="hidden" name="template[<?=$lang['id']?>][flag]" value="<?=$lang['flag']?>">
                                        <input type="hidden" name="template[<?=$lang['id']?>][required]" value="<?= ( $lang['status'] == 'enabled' ) ? 'y' : 'n' ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php
                                                        $subject = '';

                                                        if ( isset($argv['post']['template'][$lang['id']]['subject']) > 0 ){
                                                            $subject = $argv['post']['template'][$lang['id']]['subject'];
                                                        } else if ( isset($argv['emailLangs'][$lang['code']]['subject']) ) {
                                                            $subject = $argv['emailLangs'][$lang['code']]['subject'];
                                                        }
                                                    ?>
                                                    <label for="subject"><?=$txtSubject?> <span class="text-red"><?= ($lang['status'] == 'enabled') ? '*' : '' ?></span></label>
                                                    <input class="form-control form-control-sm <?=isset($argv['error'][$lang['code']]['subject']) ? 'is-invalid' : ''?>" type="text" name="template[<?=$lang['id']?>][subject]" value="<?=$subject?>">
                                                    <?=( ( isset($argv['error'][$lang['code']]['subject']) ) ? '<small class="text-red">'.$argv['error'][$lang['code']]['subject'].'</small>' : '' )?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php
                                                        $body = '';

                                                        if ( isset($argv['post']['template'][$lang['id']]['body']) > 0 ){
                                                            $body = $argv['post']['template'][$lang['id']]['body'];
                                                        } else if ( isset($argv['emailLangs'][$lang['code']]['body']) ) {
                                                            $body = $argv['emailLangs'][$lang['code']]['body'];
                                                        }
                                                    ?>
                                                    <label for="body"><?=$txtBody?> </label>
                                                    <textarea name="template[<?=$lang['id']?>][body]" class="form-control form-control-sm <?=isset($argv['error'][$lang['code']]['body']) ? 'is-invalid' : ''?>" ><?=$body?></textarea>
                                                    <?=( ( isset($argv['error'][$lang['code']]['body']) ) ? '<small class="text-red">'.$argv['error'][$lang['code']]['body'].'</small>' : '' )?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-footer with-border">
                            <a href="/email_template" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/email_template"><i class="fa fa-times-circle fa-fw"></i> <?=$btnCancel?></a>
                            <a id="btnFinish" href="" class="btn btn-success btn-sm text-white"><i class="fa fa-check-circle fa-fw"></i> <?=$btnFinish?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="/ui/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {
        $('#btnFinish').click(function(){
            $('#btnFinish').addClass('disabled');
            $('#btnCancel').addClass('disabled');
            $('#frmTemplate').submit();
            return false;
        });
    })
</script>

<?php $this->loadView('_footer', $argv);?>

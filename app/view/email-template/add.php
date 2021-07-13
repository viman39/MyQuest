<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-envelope fa-fw"></i> <?=$txtAddEmailTemplate?>
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/email_template/add" method="post" id="frmTemplate">
                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            <?=$txtAddEmailTemplate?>
                        </div>
                        <div class="card-body">
                            <?php
//                                __sys_console($argv)
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"><?=$txtUsedFor?> <span class="text-red">*</span></label>
                                        <input class="form-control form-control-sm <?=isset($argv['error']['usedFor']) ? 'is-invalid' : ''?>" type="text" name="usedFor" value="<?=( ( isset($argv['post']['usedFor']) ) ? $argv['post']['usedFor'] : '' )?>">
                                        <?=( ( isset($argv['error']['usedFor']) ) ? '<small class="text-red">'.$argv['error']['usedFor'].'</small>' : '' )?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"><?=$txtName?> <span class="text-red">*</span></label>
                                        <input class="form-control form-control-sm <?=isset($argv['error']['name']) ? 'is-invalid' : ''?>" type="text" name="name" value="<?=( ( isset($argv['post']['name']) ) ? $argv['post']['name'] : '' )?>">
                                        <?=( ( isset($argv['error']['name']) ) ? '<small class="text-red">'.$argv['error']['name'].'</small>' : '' )?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="details"><?=$txtDetails?> </label>
                                        <textarea name="details" class="form-control form-control-sm <?=isset($argv['error']['details']) ? 'is-invalid' : ''?>" ><?=( ( isset($argv['post']['details']) ) ? $argv['post']['details'] : '' )?></textarea>
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
                                                    <label for="subject"><?=$txtSubject?> <span class="text-red"><?= ($lang['status'] == 'enabled') ? '*' : '' ?></span></label>
                                                    <input class="form-control form-control-sm <?=isset($argv['error'][$lang['code']]['subject']) ? 'is-invalid' : ''?>" type="text" name="template[<?=$lang['id']?>][subject]" value="<?=( ( isset($argv['post']['template'][$lang['id']]['subject']) ) ? $argv['post']['template'][$lang['id']]['subject'] : '' )?>">
                                                    <?=( ( isset($argv['error'][$lang['code']]['subject']) ) ? '<small class="text-red">'.$argv['error'][$lang['code']]['subject'].'</small>' : '' )?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="body"><?=$txtBody?> </label>
                                                    <textarea name="template[<?=$lang['id']?>][body]" class="form-control form-control-sm <?=isset($argv['error'][$lang['code']]['body']) ? 'is-invalid' : ''?>" ><?=( ( isset($argv['post']['template'][$lang['id']]['body']) ) ? $argv['post']['template'][$lang['id']]['body'] : '' )?></textarea>
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

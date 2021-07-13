<?php $this->loadView('_header', $argv); ?>

<?php
$langCode = htmlspecialchars($this->lib->extern->cookie->get('lang'), ENT_QUOTES);
$idTemplateActive = $argv['idTemplateActive'];

$update = false;
$delete = false;

if ($this->mod->master->module('emailTemplate', 'update')) {
    $update = true;
}

if ($this->mod->master->module('emailTemplate', 'delete')) {
    $delete = true;
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="content-header">
            <h1><i class="fas fa-envelope fa-fw"></i> <?=$txtEmailTemplate?></h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
//                    __sys_console($argv)
                ?>
                <div class="col-md-3">
                    <?php
                    if ( $this->mod->master->module('emailTemplate', 'create') ){

                        ?>
                        <div class="list-group mb-1">
                            <a href="/email_template/add" class="list-group-item list-group-item-action btn bg-gradient-success btn-sm"><i class="fas fa-plus-circle fa-fw"></i> <?=$btnAddEmailTemplate?></a>
                        </div>
                        <?php
                    }
                    ?>

                    <ul class="list-group">
                        <?php
                        if ( count($argv['templates']) > 0 ){
                            foreach ( $argv['templates'] as $template ){
                                ?>
                                <li class="list-group-item list-group-item-categories <?= $template['id'] == $idTemplateActive ? 'active' : '' ?> text-white">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <a  class="<?= $template['id'] == $idTemplateActive ? 'text-success' : 'text-success ' ?>"
                                                href="<?= ($template['id'] == $idTemplateActive) ? '#' : '/email_template/index/' . $template['id'] ?>"
                                            > <?=$template['name']?> </a>

                                            <a class="text-primary float-right detail-tooltip" data-toggle="tooltip" data-placement="right" title="<?=$template['details']?>">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            if ($update) {
                                                if ($template['status'] == 'disabled') {
                                                    ?>
                                                    <a href="/email_template/status/<?= $template['id'] ?>" class="text-danger"><i
                                                                class="fas fa-ban"></i></a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="/email_template/status/<?= $template['id'] ?>" class="text-success"><i
                                                                class="fas fa-check"></i></a>
                                                    <?php
                                                }

                                                ?>
                                                <a href="/email_template/edit/<?= $template['id'] ?>" class="text-yellow"><i
                                                            class="fas fa-check-circle"></i></a>
                                                <?php
                                            }

                                            if ($delete) {
                                                ?>
                                                <a href="/email_template/delete/<?= $template['id'] ?>" class="btn-link btn-delete text-danger"
                                                   data-redirect="/email_template/delete/<?= $template['id'] ?>"><i
                                                            class="fas fa-times-circle text-red"></i></a>
                                                <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <?php
                                if ( $idTemplateActive != 0 ){
                                    ?>
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <?=$argv['templateInfo']['name']?>
                                        </h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <legend><?=$txtSubject?></legend>

                                                    <?php
                                                    foreach ( $argv['templateInfo']['langs'] as $lang => $templateLang){
                                                        $langFlag = $this->mod->lang->getByCode($lang)['flag'];

                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <i class="flag-icon flag-icon-<?=$langFlag?>"></i>
                                                                <?=strlen($templateLang['subject']) > 0 ? $templateLang['subject'] : '<span class="text-red">'.$errNotDefined.'</span>'?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-12">
                                                <fieldset>
                                                    <legend><?=$txtBody?></legend>

                                                    <?php
                                                    foreach ( $argv['templateInfo']['langs'] as $key => $templateLang){
                                                        $langFlag = $this->mod->lang->getByCode($key)['flag'];

                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <i class="flag-icon flag-icon-<?=$langFlag?>"></i>
                                                                <?=strlen($templateLang['body']) > 0 ? str_replace("\n", "<br>", $templateLang['body']) : '<span class="text-red">'.$errNotDefined.'</span>'?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="card-body">
                                        <?=$txtNoResults?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <?php
                                if ( $idTemplateActive != 0 ){
                                    ?>
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <?=$txtDemo?>
                                        </h3>
                                        <div class="card-tools">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <?php
                                                foreach ( $argv['langs'] as $lang ) {
                                                    $checked = '';

                                                    if ( $langCode == $lang['code'] ){
                                                        $checked = 'checked';
                                                    }
                                                    ?>
                                                    <label class="btn btn-default <?=( ( $checked == 'checked' ) ? 'active' : '' )?> btnLanguage" data-value="<?=$lang['code']?>">
                                                        <input type="radio" name="<?=$lang['code']?>" id="btnLanguage<?=$lang['code']?>"> <i class="flag-icon flag-icon-<?=$lang['flag']?>"></i>
                                                    </label>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <fieldset>
                                                        <legend><?=$txtDemoOrganization?></legend>
                                                        <dl class="row">
                                                            <dt class="col-md-4"><?=$fldName?></dt>
                                                            <dd class="col-md-8">OrganizationTest</dd>
                                                        </dl>
                                                    </fieldset>
                                                </div>

                                                <div class="row">
                                                    <fieldset>
                                                        <legend><?=$txtDemoUser?></legend>
                                                        <dl class="row">
                                                            <dt class="col-md-4"><?=$fldUsername?></dt>
                                                            <dd class="col-md-8">UserUsername</dd>

                                                            <dt class="col-md-4"><?=$fldPassword?></dt>
                                                            <dd class="col-md-8">UserPassword</dd>

                                                            <dt class="col-md-4"><?=$fldFirstName?></dt>
                                                            <dd class="col-md-8">UserFirstName</dd>

                                                            <dt class="col-md-4"><?=$fldLastName?></dt>
                                                            <dd class="col-md-8">UserLastName</dd>

                                                            <dt class="col-md-4"><?=$txtOrganization?></dt>
                                                            <dd class="col-md-8">OrganizationTest</dd>

                                                            <dt class="col-md-4"><?=$txtEmail?></dt>
                                                            <dd class="col-md-8">user@email.com</dd>
                                                        </dl>
                                                    </fieldset>
                                                </div>

                                                <div class="row">
                                                    <fieldset>
                                                        <legend><?=$txtDemoClient?></legend>
                                                        <dl class="row">
                                                            <dt class="col-md-4"><?=$fldUsername?></dt>
                                                            <dd class="col-md-8">ClientUsername</dd>

                                                            <dt class="col-md-4"><?=$fldPassword?></dt>
                                                            <dd class="col-md-8">ClientPassword</dd>

                                                            <dt class="col-md-4"><?=$fldFirstName?></dt>
                                                            <dd class="col-md-8">ClientFirstName</dd>

                                                            <dt class="col-md-4"><?=$fldLastName?></dt>
                                                            <dd class="col-md-8">ClientLastName</dd>

                                                            <dt class="col-md-4"><?=$txtOrganization?></dt>
                                                            <dd class="col-md-8">OrganizationTest</dd>

                                                            <dt class="col-md-4"><?=$txtEmail?></dt>
                                                            <dd class="col-md-8">client@email.com</dd>
                                                        </dl>
                                                    </fieldset>
                                                </div>

                                                <div class="row">
                                                    <fieldset>
                                                        <legend><?=$txtDemoPerson?></legend>
                                                        <dl class="row">
                                                            <dt class="col-md-4"><?=$fldUsername?></dt>
                                                            <dd class="col-md-8">PersonUsername</dd>

                                                            <dt class="col-md-4"><?=$fldPassword?></dt>
                                                            <dd class="col-md-8">PersonPassword</dd>

                                                            <dt class="col-md-4"><?=$fldFirstName?></dt>
                                                            <dd class="col-md-8">PersonFirstName</dd>

                                                            <dt class="col-md-4"><?=$fldLastName?></dt>
                                                            <dd class="col-md-8">PersonLastName</dd>

                                                            <dt class="col-md-4"><?=$txtOrganization?></dt>
                                                            <dd class="col-md-8">OrganizationTest</dd>

                                                            <dt class="col-md-4"><?=$txtEmail?></dt>
                                                            <dd class="col-md-8">person@email.com</dd>
                                                        </dl>
                                                    </fieldset>
                                                </div>

                                                <div class="row">
                                                    <fieldset>
                                                        <legend><?=$txtDemoMail?></legend>
                                                        <dl class="row">
                                                            <dt class="col-md-4"><?=$txtSubject?></dt>
                                                            <dd class="col-md-8" id="emailSubject"></dd>

                                                            <dt class="col-md-4"><?=$txtBody?></dt>
                                                            <dd class="col-md-8" id="emailBody"></dd>
                                                        </dl>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="card-body">
                                        <?=$txtNoResults?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateDemo(langCode){
        $.ajax({
            url: '/email_template/ajax/email_demo/<?=$idTemplateActive?>/' + langCode,
            dataType: 'json',
            async: false,

            success: function(response){
                $('#emailSubject').html(response.subject);
                $('#emailBody').html(response.body);
            }
        });

    }

    $(document).ready(function() {
        $('.detail-tooltip').tooltip();

        $('.btnLanguage').click(function(){
            updateDemo(this.getAttribute('data-value'));
        });

        updateDemo('<?=$langCode?>');
    })
</script>

<?php $this->loadView('_footer',$argv); ?>


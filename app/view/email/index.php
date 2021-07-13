<?php $this->loadView('_header', $argv); ?>

<?php
$langCode = htmlspecialchars($this->lib->extern->cookie->get('lang'), ENT_QUOTES);
$idEmailActive = ( ( isset($argv['idEmailActive']) ) ? $argv['idEmailActive'] : 0 );

$update = false;
$delete = false;

if ($this->mod->master->module('email', 'update')) {
    $update = true;
}

if ($this->mod->master->module('email', 'delete')) {
    $delete = true;
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="content-header">
            <h1><i class="fas fa-envelope fa-fw"></i> <?=$txtEmail?></h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
//                                    __sys_console($argv)
                ?>
                <div class="col-md-3">
                    <ul class="list-group">
                        <?php
                        if ( count($argv['emails']) > 0 ){
                            foreach ( $argv['emails'] as $email ){
                                $emailTemplate = $this->mod->emailTemplate->getById($email['idEmailTemplate'])
                                ?>
                                <li class="list-group-item list-group-item-categories <?= $email['id'] == $idEmailActive ? 'active' : '' ?> text-white">
                                    <a  class="<?= $email['id'] == $idEmailActive ? 'text-success' : 'text-success ' ?>"
                                        href="<?= ($email['id'] == $idEmailActive) ? '#' : '/email/index/' . $email['id'] ?>"
                                    > <?=$emailTemplate['name']?> </a>

                                    <?php
                                        if ( $emailTemplate['details'] != '' ){
                                            ?>
                                                <a class="text-primary float-right detail-tooltip" data-toggle="tooltip" data-placement="right" title="<?=$emailTemplate['details']?>">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            <?php
                                        }
                                    ?>
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
                                if ( $idEmailActive != 0 ){
                                    ?>
                                    <div class="card-header">
                                        <b>
                                            <?=$this->mod->emailTemplate->getById($this->mod->email->getById($idEmailActive)['idEmailTemplate'])['name']?>
                                        </b>
                                        <?php
                                        if ( $this->mod->master->module('email', 'update') ){

                                            ?>
                                            <div class="card-tools">
                                                <a href="/email/edit/<?=$idEmailActive?>" class="btn bg-gradient-warning btn-sm"><i class="fas fa-check fa-fw"></i> <?=$btnEditEmail?></a>
                                                <a href="/email/get_default/<?=$idEmailActive?>" class="btn bg-gradient-success btn-sm" data-redirect="/email/get_default/<?=$idEmailActive?>"><i class="fas fa-pen fa-fw"></i> <?=$btnGetDefaultTemplate?></a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <legend><?=$txtSubject?></legend>

                                                    <?php
                                                    foreach ( $argv['emailLangs'] as $lang => $emailLang){
                                                        $langFlag = $this->mod->lang->getByCode($lang)['flag'];

                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <i class="flag-icon flag-icon-<?=$langFlag?>"></i>
                                                                <?=strlen($emailLang['subject']) > 0 ? $emailLang['subject'] : '<span class="text-red">'.$errNotDefined.'</span>'?>
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
                                                    foreach ( $argv['emailLangs'] as $key => $emailLang){
                                                        $langFlag = $this->mod->lang->getByCode($key)['flag'];

                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <i class="flag-icon flag-icon-<?=$langFlag?>"></i>
                                                                <?=strlen($emailLang['body']) > 0 ? str_replace("\n", "<br>", $emailLang['body']) : '<span class="text-red">'.$errNotDefined.'</span>'?>
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
                                if ( $idEmailActive != 0 ){
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
            url: '/email/ajax/email_demo/<?=$idEmailActive?>/' + langCode,
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


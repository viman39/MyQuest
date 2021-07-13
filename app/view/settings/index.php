<?php $this->loadView('_header', $argv); ?>

<div class="content-header">
    <div class="container-fluid">
        <h1><i class="fas fa-cogs"></i> Settings</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/settings" method="post" id="frmClients">
                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            <h5><i class="fa fa-cogs"></i> General Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="input-client-first-name">First Name<span class="text-red">*</span></label>
                                                <input id="input-client-first-name" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['firstName']) ) ? ' is-invalid' : '' )?>" name="firstName" value="<?=( ( isset($argv['post']['firstName']) ) ? $argv['post']['firstName'] : '' )?>">
                                                <?=( ( isset($argv['error']['firstName']) ) ? '<small class="text-red">'.$argv['error']['firstName'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="input-client-last-name">Last Name<span class="text-red">*</span></label>
                                                <input id="input-client-last-name" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['lastName']) ) ? ' is-invalid' : '' )?>" name="lastName" value="<?=( ( isset($argv['post']['lastName']) ) ? $argv['post']['lastName'] : '' )?>">
                                                <?=( ( isset($argv['error']['lastName']) ) ? '<small class="text-red">'.$argv['error']['lastName'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birthdate">Birthdate<span class="text-red">*</span></label>
                                                <input type="text" class="form-control" id="birthdate" name="birthdate" value="<?=(isset($argv['post']['birthdate']) ? $argv['post']['birthdate'] : date("m-d-Y"))?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="input-client-phone">Phone</label>
                                                <input id="input-client-phone" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['phone']) ) ? ' is-invalid' : '' )?>" name="phone" value="<?=( ( isset($argv['post']['phone']) ) ? $argv['post']['phone'] : '' )?>">
                                                <?=( ( isset($argv['error']['phone']) ) ? '<small class="text-red">'.$argv['error']['phone'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">Where are you from?</label>
                                                <?php
                                                    $this->loadView('/components/select/country', array('selected' => @$argv['post']['country']))
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="industry">What is your job activity?</label>
                                                <?php
                                                    $this->loadView('/components/select/industry', array('selected' => @$argv['post']['industry']))
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="salary">What is your average yearly income?</label>
                                                <?php
                                                    $this->loadView('/components/select/salary', array('selected' => @$argv['post']['salary']))
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer with-border">
                            <a href="/client" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/client"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
                            <a id="btnFinish" href="" class="btn btn-success btn-sm text-white"><i class="fa fa-check-circle fa-fw"></i> Finish</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $('.select2').select2()

        $('#birthdate').daterangepicker({
            singleDatePicker: true
        });

        $('#btnFinish').click(function(){
            $('#btnFinish').addClass('disabled');
            $('#btnCancel').addClass('disabled');
            $('#frmClients').submit();
            return false;
        });
    });
</script>

<?php $this->loadView('_footer',$argv); ?>


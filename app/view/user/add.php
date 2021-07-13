<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-user fa-fw"></i> Users
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/user/add" method="post" id="frmUsers">
                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            Add User
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input-user-first-name">First Name<span class="text-red">*</span></label>
                                                <input id="input-user-first-name" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['firstName']) ) ? ' is-invalid' : '' )?>" name="firstName" value="<?=( ( isset($argv['post']['firstName']) ) ? $argv['post']['firstName'] : '' )?>">
                                                <?=( ( isset($argv['error']['firstName']) ) ? '<small class="text-red">'.$argv['error']['firstName'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input-user-last-name">Last Name<span class="text-red">*</span></label>
                                                <input id="input-user-last-name" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['lastName']) ) ? ' is-invalid' : '' )?>" name="lastName" value="<?=( ( isset($argv['post']['lastName']) ) ? $argv['post']['lastName'] : '' )?>">
                                                <?=( ( isset($argv['error']['lastName']) ) ? '<small class="text-red">'.$argv['error']['lastName'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input-user-email">Email<span class="text-red">*</span></label>
                                                <input id="input-user-email" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['email']) ) ? ' is-invalid' : '' )?>" name="email" value="<?=( ( isset($argv['post']['email']) ) ? $argv['post']['email'] : '' )?>">
                                                <?=( ( isset($argv['error']['email']) ) ? '<small class="text-red">'.$argv['error']['email'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input-user-phone">Phone</label>
                                                <input id="input-user-phone" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['phone']) ) ? ' is-invalid' : '' )?>" name="phone" value="<?=( ( isset($argv['post']['phone']) ) ? $argv['post']['phone'] : '' )?>">
                                                <?=( ( isset($argv['error']['phone']) ) ? '<small class="text-red">'.$argv['error']['phone'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input-user-username">Username <span class="text-red">*</span></label>
                                                <input id="input-user-username" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['username']) ) ? ' is-invalid' : '' )?>" name="username" value="<?=( ( isset($argv['post']['username']) ) ? $argv['post']['username'] : '' )?>">
                                                <?=( ( isset($argv['error']['username']) ) ? '<small class="text-red">'.$argv['error']['username'].'</small>' : '' )?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer with-border">
                            <a href="/user" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/user"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
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
        $('#btnFinish').click(function(){
            $('#btnFinish').addClass('disabled');
            $('#btnCancel').addClass('disabled');
            $('#frmUsers').submit();
            return false;
        });
    });
</script>

<?php $this->loadView('_footer', $argv);?>

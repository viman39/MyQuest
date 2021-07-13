<?php $this->loadView('/login/_header');?>

<body class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/login">
                <h1>
                    <img src="/ui/img/favicon.ico" style="width: 32px"> MyQuest
                </h1>
            </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register</p>

                <form action="/signup/<?=$argv['role']?>" method="post" id="loginForm">
                    <?php

                    if ( isset($argv['error']['generalError']) ){
                        ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <span class="text-red"><?=$argv['error']['generalError']?></span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['username']) ) ? ' is-invalid' : '' )?>" id="username" name="username" autocomplete="off" autofocus placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['email']) ) ? ' is-invalid' : '' )?>" id="email" name="email" autocomplete="off" autofocus placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="password" class="form-control form-control-sm<?=( ( isset($argv['error']['password']) ) ? ' is-invalid' : '' )?>" id="password" name="password" autocomplete="off" autofocus placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="password" class="form-control form-control-sm<?=( ( isset($argv['error']['passwordCheck']) ) ? ' is-invalid' : '' )?>" id="passwordCheck" name="passwordCheck" autocomplete="off" autofocus placeholder="Retype your password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="button" id="btnSubmit" class="btn btn-outline-success btn-block"><?='Become ' . ($argv['role'] == 'adventurer' ? 'an Adventurer' : 'a Wizard') . '!'?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btnSubmit').click(function(){
                $(this).attr('disabled', true);
                $(this).html('<i class="fas fa-circle-notch fa-spin fa-fw"></i>');
                $('#loginForm').submit();
            });

        });
    </script>

<?php $this->loadView('/login/_footer');?>
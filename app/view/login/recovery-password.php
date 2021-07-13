<?php $this->loadView('login/_header',$argv); ?>

<body class="login-page">
    <div class="login-box">

    <div class="login-logo">
        <a href="/login">
            <h1>
                <img src="/ui/img/favicon.ico" style="width: 32px"> MyQuest
            </h1>
        </a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Recover account</p>

            <form action="/password/recovery" method="post" id="loginForm">
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
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['email']) ) ? ' is-invalid' : '' )?>" id="email" name="email" autocomplete="off" autofocus placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?=( ( isset($argv['error']['email']) && strlen($argv['error']['email']) > 0 ) ? '<small class="text-red">'.$argv['error']['email'].'</small>' : '' )?>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="button" id="btnSubmit" class="btn btn-outline-success btn-block">Reset Password</button>
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

<?php $this->loadView('login/_footer',$argv); ?>
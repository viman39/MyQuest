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
                <p class="login-box-msg">20 minute adventure</p>

                <form action="/adventure/code" method="post" id="adventureForm">
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
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" id="code" name="code" autocomplete="off" autofocus placeholder="Adventure code">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="identifier" name="identifier" autocomplete="off" autofocus placeholder="Identifier (how can we call you?)" value="<?=@$argv['post']['identifier']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="button" id="btnSubmit" class="btn btn-outline-success btn-block">Start adventure</button>
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
                $('#adventureForm').submit();
            });

        });
    </script>

<?php $this->loadView('login/_footer',$argv); ?>
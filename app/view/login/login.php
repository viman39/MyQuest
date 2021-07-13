<?php $this->loadView('login/_header',$argv); ?>

<body class="layout-top-nav">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="../../index3.html" class="navbar-brand">
                <img src="/ui/img/favicon.ico" style="width: 32px">
                <span class="brand-text font-weight-light"> MyQuest</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item dropdown <?=(isset($argv['error']) and count($argv['error']) > 0) ? 'show' : ''?>">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="<?=(isset($argv['error']) and count($argv['error']) > 0) ? 'true' : 'false'?>">
                        <h5><i class="far fa-user fa-fw"></i> <span class="d-none d-sm-inline-block">Login</span></h5>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right <?=(isset($argv['error']) and count($argv['error']) > 0) ? 'show' : ''?>">
                        <div class="row">
                            <div class="col-12 p-3 text-center">
                                <form action="/login" method="post" id="loginForm">
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
                                        <input type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['username']) ) ? ' is-invalid' : '' )?>" id="username" name="username" autocomplete="off" autofocus placeholder="Username">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?=( ( isset($argv['error']['username']) && strlen($argv['error']['username']) > 0 ) ? '<small class="text-red">'.$argv['error']['username'].'</small>' : '' )?>
                                    <div class="input-group mt-3">
                                        <input type="password" class="form-control form-control-sm<?=( ( isset($argv['error']['password']) ) ? ' is-invalid' : '' )?>" id="password" name="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?=( ( isset($argv['error']['password']) && strlen($argv['error']['password']) > 0 ) ? '<small class="text-red">'.$argv['error']['password'].'</small>' : '' )?>
                                </form>

                                <?php
                                if ( count(@$argv['error']) > 0 ){
                                    ?>
                                    <p class="mb-2 mt-2">
                                        <a href="/password/recovery" id="btnForgotPassword">Forgot Password?</a>
                                    </p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-12 p-3 text-center">
                                <button type="button" id="btnSubmit" class="btn btn-outline-success btn-block">Sign In</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container mt-5">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h1>
                            <img src="/ui/img/favicon.ico" style="width: 32px"> MyQuest
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-5" style="min-height: 500px !important">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center" id="div-wizard">
                        <img src="/ui/font-awesome/svgs/solid/hat-wizard.svg" alt="hat-wizard" style="width: 111px; height: 111px;filter: opacity(40%);" id="wizard-hat-img">
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 5%">
                                <h5>
                                    Create quests and ask adventurers to take care of them<br>
                                    for some of your gold
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="/signup/wizard" class="btn btn-block btn-outline-success">Become a Wizard!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center" id="div-adventurer">
                        <img src="/ui/font-awesome/svgs/solid/dragon.svg" alt="dragon" style="width: 111px; height: 111px;filter: opacity(40%);" id="dragon-img">
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 5%">
                                <h5>
                                    Complete quests and get paid gold <br>
                                    for your services
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="/signup/adventurer" class="btn btn-block btn-outline-success">Become an Adventurer!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-md-center">
                    <div class="col-md-auto" id="div-adventure">
                        <div class="row">
                            <img src="/ui/font-awesome/svgs/solid/exchange-alt.svg" alt="in-out" style="width: 50px; height: 50px;filter: opacity(40%);" id="in-out-img">
                            <h5 class="mt-2 ml-3">
                                Let's go, in and out, 20 minute adventure!
                            </h5>
                        </div>
                        <small>*if you have a code, this is the place you need to be</small>
                        <a href="/adventure" class="btn btn-sm btn-block btn-outline-success mt-1">20 minute adventure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('#div-wizard').mouseover(function(){
            $('#wizard-hat-img').css('filter', 'opacity(100%)')
        }).mouseout(function(){
            $('#wizard-hat-img').css('filter', 'opacity(40%)')
        })

        $('#div-adventurer').mouseover(function(){
            $('#dragon-img').css('filter', 'opacity(100%)')
        }).mouseout(function(){
            $('#dragon-img').css('filter', 'opacity(40%)')
        })

        $('#div-adventure').mouseover(function(){
            $('#in-out-img').css('filter', 'opacity(100%)')
        }).mouseout(function(){
            $('#in-out-img').css('filter', 'opacity(40%)')
        })

        $('#btnSubmit').click(function(){
            $(this).attr('disabled', true);
            $(this).html('<i class="fas fa-circle-notch fa-spin fa-fw"></i>');
            $('#loginForm').submit();
        });
    });
</script>

<?php $this->loadView('login/_footer',$argv); ?>
<?php $this->loadView('_header', $argv); ?>

<div class="content-header">
    <div class="container-fluid">
        <h1><i class="fas fa-coins fa-fw"></i> Coins</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <?php
        if ( $this->mod->user->settingsSet() == true ){
            ?>
            <div class="callout callout-success">
                <div class="row">
                    <div class="col-md-12">
                        <h5>You have <i class="fas fa-coins"></i> <?=$argv['user']['coins']?></h5>
                        <a href="/coins/buy" class="btn btn-outline-success" id="show-buy-panel"><i class="fas fa-coins fa-fw"></i> Buy more coins!</a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="callout callout-danger">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Your general information is not set, in order to find some quests for you please update you general information</h5>
                        <a href="/settings" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt fa-fw"></i> General information</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <div id="buy-panel">

        </div>
    </div>
</div>

<script>
    $('#show-buy-panel').click(function(){
        $.ajax({
            url: '/coins/buy',
        }).done(function(response){
            if ( response !== 'false' ){
                $('#buy-panel').html(response)
            }
        })

        return false;
    })
</script>

<?php $this->loadView('_footer',$argv); ?>


<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-hat-wizard fa-fw"></i> Quest Creator
        </h1>
    </div>
</section>

<section class="content">
    <?php
    //__sys_console($argv['post'])
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/quest/create/finish" method="post" id="formFinish">
                    <input type="hidden" name="submitPost" value="finish">

                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            <?php
                            $this->loadView('quest/create/menu', array(
                                'menu' => 'finish'
                            ));
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <i class="fas fa-cog"> Quest general settings</i>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <table class="table table-condensed table-striped">
                                                <tr>
                                                    <td>Quest Name</td>
                                                    <td><?=$argv['quest']['general']['name']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Quest Reward</td>
                                                    <td><?=$argv['quest']['general']['reward']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Quest Description</td>
                                                    <td><?=$argv['quest']['general']['details']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Shuffle questions</td>
                                                    <td>
                                                        <?php
                                                        if ( $argv['quest']['general']['shuffle'] == 'yes' ){
                                                            echo 'Yes';
                                                        } else {
                                                            echo 'No';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Quest Availability</td>
                                                    <td>
                                                        <?php
                                                        if ( $argv['quest']['general']['availability'] == 'all' ){
                                                            echo 'Anyone can access your Quest based on your filters';
                                                        } else if ( $argv['quest']['general']['availability'] == 'code' ){
                                                            echo 'Create a unique code that let\'s anyone having the code access your Quest (account isn\'t necessary) ';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                    if ( $argv['quest']['general']['availability'] == 'all' ){
                                                        ?>
                                                        <tr>
                                                            <td>Country Filter</td>
                                                            <td>
                                                                <?php
                                                                if ( isset($argv['quest']['general']['country']) ){
                                                                    foreach ( $argv['quest']['general']['country'] as $country ){
                                                                        echo $country . '<br>';
                                                                    }
                                                                } else {
                                                                    echo 'Include All';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Industry Filter</td>
                                                            <td>
                                                                <?php
                                                                if ( isset($argv['quest']['general']['industry']) ){
                                                                    foreach ( $argv['quest']['general']['industry'] as $industry ){
                                                                        echo $industry . '<br>';
                                                                    }
                                                                } else {
                                                                    echo 'Include All';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Income Filter</td>
                                                            <td>
                                                                <?php
                                                                if ( isset($argv['quest']['general']['salary']) ){
                                                                    foreach ( $argv['quest']['general']['salary'] as $salary ){
                                                                        echo $salary . '<br>';
                                                                    }
                                                                } else {
                                                                    echo 'Include All';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    } else if ( $argv['quest']['general']['availability'] == 'code' ){
                                                        ?>
                                                        <tr>
                                                            <td>Quest Code</td>
                                                            <td>
                                                                <?=$argv['quest']['general']['code']?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <i class="fas fa-cog">Quest questions</i>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <?php
                                                $this->loadView('quest/quest', array("questions" => $argv['quest']['questions']));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer with-border">
                            <a href="/quest/create/cancel" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/quest/create/cancel"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
                            <a href="/quest/create/questionnaire" id="btnBack" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw"></i> Back</a>
                            <a id="btnFinish" href="/quest/create/finish" class="btn bg-gradient-success btn-sm text-white"><i class="fa fa-check-circle fa-fw"></i> Finish</a>
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
            $('#btnCancel').addClass('disabled');
            $('#btnFinish').addClass('disabled');
            $('#formFinish').submit();
            return false;
        });
    });
</script>

<?php $this->loadView('_footer', $argv);?>

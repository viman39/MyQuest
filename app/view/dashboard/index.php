<?php $this->loadView('_header', $argv); ?>

<div class="content-header">
    <div class="container-fluid">
        <h1><i class="fas fa-scroll fa-fw"></i> Dashboard</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <?php
            if ( $this->mod->user->settingsSet() == true ){
                $userRole = $this->lib->extern->session->user['role'];
                if ( $userRole == 'user' ){
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $this->loadView('dashboard/widget/answers-received');
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $this->loadView('dashboard/widget/most-answered-quests');
                                ?>
                            </div>
                        </div>
                    <?php
                } else if ( $userRole == 'client' ){
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $this->loadView('dashboard/widget/answered-quests');
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $this->loadView('dashboard/widget/suggested-quest');
                            ?>
                        </div>
                    </div>
                    <?php
                }
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
    </div>
</div>

<?php $this->loadView('_footer',$argv); ?>


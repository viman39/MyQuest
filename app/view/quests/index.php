<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-dragon fa-fw"></i> Quests
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php
                if ( $this->mod->user->settingsSet() == true ){
                    if ( count(@$argv['quests']) > 0 ){
                        ?>
                        <div class="col-md-12">
                            <div class="card card-success card-outline">
                                <div class="card-body">
                                    <table id="clientTable" class="table table-striped table-hover projects " style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th class="text-center">Approximate adventure time (min)</th>
                                            <th class="text-right"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ( $argv['quests'] as $quest ){
                                            ?>
                                            <tr>

                                                <td>
                                                    <?=$quest['name']?>
                                                    <br>
                                                    <small>Created <?=$quest['date']?></small>
                                                </td>
                                                <td>
                                                    <?=$quest['description']?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ( $quest['averageSolvingTime'] == 0 ){
                                                        ?>
                                                        <h5><span class="badge badge-secondary">?</span></h5>
                                                        <?php
                                                    } else if ( $quest['averageSolvingTime'] < 60 ){
                                                        ?>
                                                        <h5><span class="badge badge-success">< 1</span></h5>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <h5><span class="badge badge-success"><?=intval($quest['averageSolvingTime']/60)?></span></h5>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right" data-sort="<?=$quest['reward']?>">
                                                    <a href="/quests/begin/<?=$quest['id']?>" class="btn btn-sm btn-outline-success"><strong>Begin this Quest! <i class="fas fa-coins"></i> <?=$quest['reward']?></strong></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-6">
                            <div class="callout callout-warning">
                                <h5>There are no Quests for you yet!</h5>
                                <p>Try again later</p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12">
                        <div class="callout callout-danger">
                            <h5>Your general information is not set, in order to find some quests for you please update you general information</h5>
                            <a href="/settings" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt fa-fw"></i> General information</a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>

<script src="/ui/plugins/datatables/jquery.dataTables.js"></script>
<script src="/ui/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function(){
        $('#clientTable').DataTable({
            "paging": false,
            "scrollX": true
        })
    })
</script>
<?php $this->loadView('_footer', $argv);?>


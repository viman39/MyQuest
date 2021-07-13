<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-magic fa-fw"></i> Quests
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Quests List</h3>
                        <div class="card-tools">
                            <a href="/quest/create" class="btn bg-gradient-primary btn-sm text-white"><i class="fas fa-hat-wizard fa-fw"></i> Create Quest</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="questTable" class="table table-striped projects" style="width: 100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Availability</th>
                                <th class="text-center">Reward</th>
                                <th class="text-center">Answers</th>
                                <th class="text-center">Average Solving Time (min)</th>
                                <th class="text-center">Status</th>
                                <th style="width: 12%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $iterator = 1;
                            if ( count(@$argv['quests']) > 0 ){
                                foreach ( $argv['quests'] as $quest ){
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$iterator?>
                                        </td>
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
                                                if ( $quest['availability'] == 'all' ){
                                                    ?>
                                                        All
                                                    <?php
                                                } else if ( $quest['availability'] == 'code' ) {
                                                    ?>
                                                        <?=$quest['code']?>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center" data-sort="<?=$quest['reward']?>">
                                            <h6><i class="fas fa-coins"></i> <?=$quest['reward']?></h6>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $answers = count($this->mod->answer->getAllByQuest($quest['id']));
                                                if ( $answers == 0 ){
                                                    ?>
                                                    <h5><span class="badge badge-secondary"><?=$answers?></span></h5>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <h5><span class="badge badge-success"><?=$answers?></span></h5>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                if ( $quest['averageSolvingTime'] == 0 ){
                                                    ?>
                                                    <h5><span class="badge badge-secondary">-</span></h5>
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
                                        <td class="text-center">
                                            <?php
                                                if ( $quest['status'] == 'enabled' ){
                                                    ?>
                                                        <a href="/quest/status/<?=$quest['id']?>"><h5><span class="badge badge-success">Enabled</span></h5></a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <a href="/quest/status/<?=$quest['id']?>"><h5><span class="badge badge-secondary">Disabled</span></h5></a>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a href="/quest/edit/<?=$quest['id']?>"
                                                   class="text-info open-details-modal class-tooltip"
                                                   data-id="<?=$quest['id']?>"
                                                   data-name="<?=$quest['name']?>"
                                                   data-toggle="tooltip"
                                                   title="See questionnaire"><h4><i class="fas fa-eye"></i></h4></a>
                                                <a href="/quest/download/excel/<?=$quest['id']?>"
                                                   class="text-success ml-1 class-tooltip"
                                                   data-toggle="tooltip"
                                                   title="Download Excel"><h4><i class="fas fa-file-excel"></i></h4></a>
                                                <a href="/quest/download/csv/<?=$quest['id']?>"
                                                   class="text-success ml-1 class-tooltip"
                                                   data-toggle="tooltip"
                                                   title="Download CSV"><h4><i class="fas fa-file-csv"></i></h4></a>
                                                <a href="/quest/delete/<?=$quest['id']?>"
                                                   class="btn-link btn-delete text-danger ml-1 class-tooltip"
                                                   data-redirect="/quest/delete/<?=$quest['id']?>"
                                                   data-toggle="tooltip"
                                                   title="Delete Quest"><h4><i class="fas fa-times-circle text-red"></i></h4></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $iterator++;
                                }
                            }else{
                                ?>
                                <tr>
                                    <td colspan="9" class="text-center">No Quests created yet</td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="questionnaire-modal-details">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="questionnaire-modal-details-body">
                <div class="row">
                    <div class="col-md-12 text-center text-primary">
                        <i class="fa fa-circle-o-notch fa-spin fa-fw"></i> Loading ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/ui/plugins/datatables/jquery.dataTables.js"></script>
<script src="/ui/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function(){
        $('.class-tooltip').tooltip({
            placement: 'auto'
        })

        $('#questTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 8 }
            ],
            "paging": false,
            "scrollX": true
        })
    })

    $('.open-details-modal').click(function(){
        var idQuest = $(this).data('id');
        var nameQuest = $(this).data('name');

        $('#modal-title').html(nameQuest);
        $('#questionnaire-modal-details').modal('show');

        $.ajax({
            url: '/quest/ajax/get-quest-modal/'+idQuest,
            async: true,
            success: function(html){
                $('#questionnaire-modal-details-body').html(html);
            }
        });

        return false;
    })
</script>

<?php $this->loadView('_footer', $argv);?>


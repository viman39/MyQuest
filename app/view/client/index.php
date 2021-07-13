<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-user fa-fw"></i> Clients
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Clients List</h3>
                        <div class="card-tools">
                            <a href="/client/add" class="btn bg-gradient-primary btn-sm text-white"><i class="fas fa-plus-circle fa-fw"></i> Add Client</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="clientTable" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Name</th> <!-- firstName + lastName -->
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( count($argv['clients']) > 0 ){
                                foreach ( $argv['clients'] as $client ){
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$client['firstName'] . ' ' . $client['lastName']?>
                                        </td>
                                        <td>
                                            <?=$client['username']?>
                                        </td>
                                        <td>
                                            <?=$client['phone']?>
                                        </td>
                                        <td>
                                            <?=$client['email']?>
                                        </td>
                                        <td class="text-center">
                                            <a href="/client/edit/<?=$client['id']?>" class="text-yellow"><i class="fas fa-check-circle"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="/client/delete/<?=$client['id']?>" class="btn-link btn-delete text-danger" data-redirect="/client/delete/<?=$client['id']?>"><i class="fas fa-times-circle text-red"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">No Results</td>
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

<script src="/ui/plugins/datatables/jquery.dataTables.js"></script>
<script src="/ui/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready( function () {
        $('#clientTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 4 },
                { "orderable": false, "targets": 5 }
            ]
        });
    } );
</script>

<?php $this->loadView('_footer', $argv);?>


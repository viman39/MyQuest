<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-user fa-fw"></i> Users
        </h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Users List</h3>
                        <div class="card-tools">
                            <a href="/user/add" class="btn bg-gradient-primary btn-sm text-white"><i class="fas fa-plus-circle fa-fw"></i> Add User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="userTable" class="table table-bordered table-hover table-striped">
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
                            if ( count($argv['users']) > 0 ){
                                foreach ( $argv['users'] as $user ){
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$user['firstName'] . ' ' . $user['lastName']?>
                                        </td>
                                        <td>
                                            <?=$user['username']?>
                                        </td>
                                        <td>
                                            <?=$user['phone']?>
                                        </td>
                                        <td>
                                            <?=$user['email']?>
                                        </td>
                                        <td class="text-center">
                                            <a href="/user/delete/<?=$user['id']?>" class="btn-link btn-delete text-danger" data-redirect="/user/delete/<?=$user['id']?>"><i class="fas fa-times-circle text-red"></i></a>
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
        $('#userTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 4 },
                { "orderable": false, "targets": 5 }
            ]
        });
    } );
</script>

<?php $this->loadView('_footer', $argv);?>


<?php $this->loadView('_header', $argv);?>

    <section class="content-header">
        <div class="container-fluid">
            <h1><i class="fas fa-ban fa-fw"></i> No Access</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="error-page">
                <h2 class="headline text-danger"><i class="fas fa-ban"></i></h2>
                <div class="error-content">
                    <h3>
                        <i class="fas fa-ban text-danger"></i> You don't have access to this page
                    </h3>
                    <p>
                        You view this page because you don't have permission to access it.
                    </p>

                    <a href="/dashboard" class="btn bg-gradient-success btn-sm"><i class="fas fa-tachometer-alt fa-fw"></i> Dashboard</a>
                    <?php
                    if ( isset($_SERVER['HTTP_REFERER']) ){
                        ?>
                        <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn bg-gradient-secondary btn-sm"><i class="fas fa-arrow-alt-circle-left fa-fw"></i> Go Back To previous page</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php $this->loadView('_footer', $argv);?>
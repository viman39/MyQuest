<div class="row">
    <div class="col-md-12">
        <?php
            if ( $argv['suggestedQuest'] == false ){
                ?>
                <div class="callout callout-warning">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>There are no adventures suggested for you yet</h5>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?=$argv['suggestedQuest']['name']?></h4>
                            <h6><?=$argv['suggestedQuest']['description']?></h6>
                            <a href="/quests/begin/<?=$argv['suggestedQuest']['id']?>" class="btn btn-sm btn-outline-success mt-3"><strong>Begin this Quest! <i class="fas fa-coins"></i> <?=$argv['suggestedQuest']['reward']?></strong></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
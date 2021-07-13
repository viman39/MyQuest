<?php
    $questionId = $argv['key'];
    if ( $argv['key'] == "test" ){
        ?>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <i class="fas fa-eye"></i> Question Snippet
            </div>
        </div>
        <br>
        <?php
    }

    if ( @$argv['iterator'] != false ){
        $questionText = $argv['iterator'] . '. ' . $argv['question']['questionText'];
    } else {
        $questionText = $argv['question']['questionText'];
    }

    if ( @$argv['question']['questionMandatory'] == 'true' ){
        $questionText .= '<span class="text-red">*</span>';
    }

    $colMd = 12;

    if ( in_array(@$argv['question']['answerLength'], [3, 6, 12]) ){
        $colMd = @$argv['question']['answerLength'];
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="<?=$questionId?>"><?=$questionText?> <?=(isset($argv['error']) ? '<small class="text-red">'.$argv['error'].'</small>' : '')?></label>
            <?php
            if ( isset($argv['question']['imageBase64']) and $argv['question']['imageBase64'] != '' ){
                ?>
                <div class="col-md-6">
                    <img src="<?=$argv['question']['imageBase64']?>" alt="uploaded-image" style="width: 100%">
                </div>
                <?php
            }
            ?>
            <input type="text" id="<?=$questionId?>" class="form-control col-md-<?=$colMd?> <?=(isset($argv['error']) ? 'is-invalid' : '')?>" name="<?=$questionId?>" value="<?=@$argv['value']?>">
        </div>
    </div>
</div>
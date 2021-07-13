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

?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <fieldset>
                <strong><?=$questionText?> <?=(isset($argv['error']) ? '<small class="text-red">'.$argv['error'].'</small>' : '')?></strong>
                <?php
                if ( isset($argv['question']['imageBase64']) and $argv['question']['imageBase64'] != '' ){
                    ?>
                    <div class="col-md-6">
                        <img src="<?=$argv['question']['imageBase64']?>" alt="uploaded-image" style="width: 100%">
                    </div>
                    <?php
                }
                ?>
                <?php
                if ( isset($argv['question']['checkboxTexts']) and is_array($argv['question']['checkboxTexts']) ){
                    foreach ( $argv['question']['checkboxTexts'] as $key => $checkbox ){
                        ?>
                        <div>
                            <input type="checkbox" id="<?=$questionId . $key?>" name="<?=$questionId?>[]" value="<?=$checkbox?>" <?=(isset($argv['value']) and in_array($checkbox, $argv['value'])) ? 'checked' : ''?>>
                            <label for="<?=$questionId . $key?>"><?=$checkbox?></label>
                        </div>
                        <?php
                    }
                }

                if ( isset($argv['question']['checkboxOther']) and $argv['question']['checkboxOther'] == 'true' ){
                    ?>
                    <div>
                        <input type="checkbox" id="<?=$questionId . 'other'?>" name="<?=$questionId?>[]" value="Other" <?=((isset($argv['value']) and in_array('Other', $argv['value'])) ? 'checked' : '')?>>
                        <label for="<?=$questionId . 'other'?>">Other: </label>
                        <input type="text" id="<?=$questionId . 'other-value'?>" name="<?=$questionId . 'OtherValue'?>" value="<?=@$argv['post'][$questionId . 'OtherValue']?>">
                    </div>
                    <?php
                }
                ?>
            </fieldset>
        </div>
    </div>
</div>
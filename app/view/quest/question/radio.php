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
<div class="row mt-2">
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
                if ( isset($argv['question']['radioTexts']) and is_array($argv['question']['radioTexts']) ){
                    foreach ( $argv['question']['radioTexts'] as $key => $checkbox ){
                        ?>
                        <div>
                            <input type="radio" id="<?=$questionId . $key?>" name="<?=$questionId?>" value="<?=$checkbox?>" <?=(isset($argv['value']) and $argv['value'] == $checkbox) ? 'checked' : ''?>>
                            <label for="<?=$questionId . $key?>"><?=$checkbox?></label>
                        </div>
                        <?php
                    }
                }
                ?>
            </fieldset>
        </div>
    </div>
</div>
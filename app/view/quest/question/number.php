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
            <input type="text" id="<?=$questionId?>" name="<?=$questionId?>" value="<?=@$argv['value']?>"/>
        </div>
    </div>
</div>

<script>
    $("#<?=$questionId?>").ionRangeSlider({
        skin: 'round',
        <?php
            if ( isset($argv['question']['predefinedValues']) and $argv['question']['predefinedValues'] == 'true' ){
                ?>
                    values: ["<?=implode("\" , \"", explode(",", $argv['question']['valuesForPredefined']))?>"],
                <?php
            } else {
                ?>
                    min: '<?=$argv['question']['minValue']?>',
                    max: '<?=$argv['question']['maxValue']?>',
                <?php
            }
            if ( isset($argv['question']['grid']) and $argv['question']['grid'] == 'true' ){
                ?>
                    grid: true,
                <?php
            }
            if ( isset($argv['question']['doubleHandles']) and $argv['question']['doubleHandles'] == 'true' ){
                ?>
                    type: 'double',
                <?php
            }
        ?>
    });
</script>
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
    <div class="col-md-4">
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
            <input type="text" class="form-control" id="<?=$questionId?>" name="<?=$questionId?>" value="<?=isset($argv['value']) ? $argv['value'] : date("m-d-Y")?>" />
        </div>
    </div>
</div>

<script>
    $('#<?=$questionId?>').daterangepicker({

        <?php
            if ( $argv['key'] == "test" ){
                ?>
                    drops: 'up',
                <?php
            }
            if ( isset($argv['question']['showTime']) and $argv['question']['showTime'] == 'true' ){
                ?>
                    timePicker: true,
                <?php
            }
            if ( isset($argv['question']['useRange']) and $argv['question']['useRange'] == 'true' ){
                ?>
                    singleDatePicker: false,
                <?php
            } else {
                ?>
                    singleDatePicker: true,
                <?php
            }
        ?>
    });
</script>
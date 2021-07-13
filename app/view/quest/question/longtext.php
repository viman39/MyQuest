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

if ( isset($argv['question']['minCharacters']) and !in_array($argv['question']['minCharacters'], ['', 0]) ){
    $questionText .= ' (min. ' . $argv['question']['minCharacters'];

    if ( isset($argv['question']['maxCharacters']) and !in_array($argv['question']['maxCharacters'], ['', 0]) ){
        $questionText .= ' - max. ' . $argv['question']['maxCharacters'];
    }

    $questionText .= ' chars)';
} else if ( isset($argv['question']['maxCharacters']) and !in_array($argv['question']['maxCharacters'], ['', 0]) ){
    $questionText .= ' (max. ' . $argv['question']['maxCharacters'] . ' chars)';
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="<?=$questionId?>"><?=$questionText?> <?=(isset($argv['error']) ? '<small class="text-red">'.$argv['error'].'</small>' : '')?></label> <small class="text-red" id="<?=$questionId.'error'?>"></small>
            <?php
            if ( isset($argv['question']['imageBase64']) and $argv['question']['imageBase64'] != '' ){
                ?>
                <div class="col-md-6">
                    <img src="<?=$argv['question']['imageBase64']?>" alt="uploaded-image" style="width: 100%">
                </div>
                <?php
            }
            ?>
            <textarea class="form-control snippet-loader-longtext <?=(isset($argv['error']) ? 'is-invalid' : '')?>" id="<?=$questionId?>" name="<?=$questionId?>" rows="<?=@$argv['question']['boxHeight']?>" style="resize: none"><?=@$argv['value']?></textarea>
        </div>
    </div>
</div>

<script>
    $("#<?=$questionId?>").change(function(){
        var minCharacters = parseInt(<?=$argv['question']['minCharacters']?>)
        var maxCharacters = parseInt(<?=$argv['question']['maxCharacters']?>)
        var textLengthError = $("#<?=$questionId.'error'?>")
        var textLength = $(this).val().length

        if ( Number.isInteger(minCharacters) ){
            if ( textLength < minCharacters ){
                console.log("go")
                textLengthError.text("Your answer is too short")
            } else if ( Number.isInteger(minCharacters) && textLength > maxCharacters ) {
                textLengthError.text("Your answer is too long")
            } else {
                textLengthError.text("")
            }
        } else if ( Number.isInteger(maxCharacters) && textLength > maxCharacters){
            textLengthError.text("Your answer is too long")
        } else {
            textLengthError.text("")
        }
    });
</script>
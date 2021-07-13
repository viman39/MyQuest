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
            <select id="<?=$questionId?>" name="<?=$questionId?>" class="form-control col-md-4">
                <?php
                if ( isset($argv['question']['includeSelect']) and $argv['question']['includeSelect'] == 'true' ){
                    ?>
                    <option value="0">Select</option>
                    <?php
                }
                if ( isset($argv['question']['selectTexts']) and is_array($argv['question']['selectTexts']) ){
                    foreach ( $argv['question']['selectTexts'] as $key => $checkbox ){
                        ?>
                        <option value="<?=$checkbox?>" <?=(isset($argv['value']) and $argv['value'] == $checkbox) ? 'selected' : ''?>><?=$checkbox?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>

<script>
    $("#<?=$questionId?>").select2({
        <?php
            if ( isset($argv['question']['searchBox']) and $argv['question']['searchBox'] != 'true' ){
                ?>
                    minimumResultsForSearch: -1,
                <?php
            }
        ?>
    })
</script>
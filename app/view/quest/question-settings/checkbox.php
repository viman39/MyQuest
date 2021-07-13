<?php
$this->loadView("quest/question-settings/general-settings", $argv)
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="question-text">
                Write your answer options here (use Enter to write one answer on each row):
            </label>
            <textarea class="form-control snippet-loader-checkbox" id="checkbox-texts" rows="5"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-checkbox" type="checkbox" id="include-option-other">
            <label for="include-option-other"> Include option "Other: " with default input text</label>
        </div>
    </div>
</div>

<script>
    $("#checkbox-texts").change(function(){
        var text = $(this).val()
        var texts = text.split("\n")
        var newText = ""

        for ( i=0; i<texts.length; i++ ){
            if ( texts[i].trim() == "" ){
                continue;
            }
            newText = newText + texts[i].trim() + "\n"
        }

        $(this).val(newText)
    })

    $(".snippet-loader-checkbox").change(function(){
        if ( $("#question-text").val().trim() != "" && $("#checkbox-texts").val().trim() != "" ){
            $.ajax({
                url: '/quest/ajax/get-question-snippet',
                type: 'POST',
                data: {
                    'questionType': $('#select-question-type').val(),
                    'questionText': $("#question-text").val(),
                    'questionMandatory': $("#question-mandatory").is(":checked"),
                    'checkboxTexts': $("#checkbox-texts").val(),
                    'checkboxOther': $("#include-option-other").is(":checked"),
                },
            }).done(function(response){
                $('#question-snippet').html(response);
                addQuestionModalButtonClass('removeClass', 'd-none')
            });
        } else {
            $('#question-snippet').html("");
            addQuestionModalButtonClass('addClass', 'd-none')
        }
    })
</script>

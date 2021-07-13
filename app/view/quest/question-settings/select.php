<?php
$this->loadView("quest/question-settings/general-settings", $argv)
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="question-text">
                Write your answer options here (use Enter to write one answer on each row):
            </label>
            <textarea class="form-control snippet-loader-select" id="select-texts" rows="5"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-select" type="checkbox" id="include-select">
            <label for="include-select"> Include "Select" as default value</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-select" type="checkbox" id="select-search-box">
            <label for="select-search-box"> Show search-box</label>
        </div>
    </div>
</div>

<script>
    $("#radio-texts").change(function(){
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
    });

    $(".snippet-loader-select").change(function(){
        if ( $("#question-text").val().trim() != "" && $("#select-texts").val().trim() != "" ){
            $.ajax({
                url: '/quest/ajax/get-question-snippet',
                type: 'POST',
                data: {
                    'questionType': $('#select-question-type').val(),
                    'questionText': $("#question-text").val(),
                    'questionMandatory': $("#question-mandatory").is(":checked"),
                    'selectTexts': $("#select-texts").val(),
                    'includeSelect': $("#include-select").is(":checked"),
                    'searchBox': $("#select-search-box").is(":checked"),
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

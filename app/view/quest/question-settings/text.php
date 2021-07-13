<?php
    $this->loadView("quest/question-settings/general-settings", $argv)
?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-0">
            <label for="answer-length">Answer length:</label>
            <select class="form-control snippet-loader-text" id="answer-length">
                <option value="3">Small</option>
                <option value="6">Medium</option>
                <option value="12">Large</option>
            </select>
        </div>
    </div>
</div>

<script>
    $(".snippet-loader-text").change(function(){
        if ( $("#question-text").val().trim() != "" ){
            $.ajax({
                url: '/quest/ajax/get-question-snippet',
                type: 'POST',
                data: {
                    'questionType': $('#select-question-type').val(),
                    'questionText': $("#question-text").val(),
                    'answerLength': $("#answer-length").val(),
                    'questionMandatory': $("#question-mandatory").is(":checked"),
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

<?php
$this->loadView("quest/question-settings/general-settings", $argv)
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-date" type="checkbox" id="date-include-time">
            <label for="date-include-time"> Include time picker</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-date" type="checkbox" id="date-use-range">
            <label for="date-use-range"> Use ranges</label>
        </div>
    </div>
</div>

<script>
    $(".snippet-loader-date").change(function(){
        if ( $("#question-text").val().trim() != "" ){
            $.ajax({
                url: '/quest/ajax/get-question-snippet',
                type: 'POST',
                data: {
                    'questionType': $('#select-question-type').val(),
                    'questionText': $("#question-text").val(),
                    'questionMandatory': $("#question-mandatory").is(":checked"),
                    'showTime': $("#date-include-time").is(":checked"),
                    'useRange': $("#date-use-range").is(":checked"),
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

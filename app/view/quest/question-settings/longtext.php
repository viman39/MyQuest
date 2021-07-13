<?php
    $this->loadView("quest/question-settings/general-settings", $argv)
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="box-height">Answer box height:</label>
            <input class="form-control snippet-loader-longtext col-md-3"  type="number" id="box-height" value="2">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="characters-limit">Number of characters limit:</label>
            <select class="form-control select2 col-md-3 snippet-loader-longtext" id="characters-limit">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
    </div>
</div>

<div class="row d-none" id="characters-limit-settings">
    <div class="col-md-3">
        <div class="form-group">
            <label for="min-characters">Min characters:</label>
            <input class="form-control snippet-loader-longtext"  type="number" id="min-characters">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="max-characters">Max characters:</label>
            <input class="form-control snippet-loader-longtext"  type="number" id="max-characters">
        </div>
    </div>
</div>

<script>
    $("#characters-limit").change(function(){
        if ( $(this).val() == 'yes' ){
            $('#characters-limit-settings').removeClass("d-none")
        } else {
            $('#characters-limit-settings').addClass("d-none")
            $('#min-characters').val("")
            $('#max-characters').val("")
        }
    });

    $(".snippet-loader-longtext").change(function(){
        if ( $("#question-text").val().trim() != "" ){
            $.ajax({
                url: '/quest/ajax/get-question-snippet',
                type: 'POST',
                data: {
                    'questionType'      : $('#select-question-type').val(),
                    'questionText'      : $("#question-text").val(),
                    'boxHeight'         : $("#box-height").val(),
                    'questionMandatory' : $("#question-mandatory").is(":checked"),
                    'minCharacters'     : $("#min-characters").val(),
                    'maxCharacters'     : $("#max-characters").val(),
                },
            }).done(function(response){
                $('#question-snippet').html(response);
                addQuestionModalButtonClass('removeClass', 'd-none')
            });
        } else {
            $('#question-snippet').html("");
            addQuestionModalButtonClass('addClass', 'd-none')
        }
    });

    $("#box-height").change(function(){
        var value = $(this).val();

        if ( value < 0 ){
            $(this).val(1)
        } else if ( value > 10 ){
            $(this).val(10)
        }
    });

    $("#min-characters").change(function(){
        var minValue = parseInt($(this).val())
        var maxValue = parseInt($("#max-characters").val())

        if ( minValue < 0 ){
            $(this).val(0)
        } else if ( maxValue != 0 && minValue > maxValue ){
            $(this).val(maxValue - 1)
        }
    });

    $("#max-characters").change(function(){
        var maxValue = parseInt($(this).val())
        var minValue = parseInt($("#min-characters").val())

        if ( maxValue < minValue ){
            $(this).val(minValue + 1)
        }
    });

</script>

<?php
$this->loadView("quest/question-settings/general-settings", $argv)
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-number" type="checkbox" id="number-values">
            <label for="number-values"> Use predefined values</label>
        </div>
    </div>
</div>

<div class="row d-none" id="number-values-predefined">
    <div class="col-md-12">
        <label for="values-for-predefined">Write values separated by commas (,) </label>
        <input type="text" id="values-for-predefined" class="form-control snippet-loader-number">
    </div>
</div>

<div class="row" id="number-values-not-predefined">
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label for="min-number">Min number:</label>
                <input class="form-control snippet-loader-number"  type="number" id="min-number" value="0">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="max-number">Max number:</label>
                <input class="form-control snippet-loader-number"  type="number" id="max-number" value="100">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-number" type="checkbox" id="grid">
            <label for="grid"> Show grid</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-number" type="checkbox" id="double-handles">
            <label for="double-handles"> Use double handles</label>
        </div>
    </div>
</div>

<script>
    $("#number-values").change(function(){
        var usePredefinedValues = $(this).is(":checked")

        if ( usePredefinedValues == true ){
            $("#number-values-predefined").removeClass("d-none")
            $("#number-values-not-predefined").addClass("d-none")
            $("#min-number").val("")
            $("#max-number").val("")
        } else {
            $("#number-values-predefined").addClass("d-none")
            $("#number-values-not-predefined").removeClass("d-none")
            $("#values-for-predefined").val("")
        }
    })

    $("#min-number").change(function(){
        var minNumber = parseFloat($(this).val())
        var maxNumber = parseFloat($("#max-number").val())

        if ( minNumber > maxNumber ){
            $(this).val(maxNumber - 1)
        }
    })

    $("#max-number").change(function(){
        var maxNumber = parseFloat($(this).val())
        var minNumber = parseFloat($("#min-number").val())

        if ( maxNumber < minNumber ){
            $(this).val(minNumber + 1)
        }
    })

    $(".snippet-loader-number").change(function(){
        var loadSnippet = false

        if ( $("#question-text").val().trim() != "" ){
            if ( $("#number-values").is(":checked") == true ){
                if ( $("#values-for-predefined").val().trim() != "" ){
                    loadSnippet = true;
                }
            } else {
                if ( !(isNaN(parseFloat($("#min-number").val())) || isNaN(parseFloat($("#max-number").val()))) ){
                    loadSnippet = true;
                }
            }
        }

        if ( loadSnippet == true ){
            $.ajax({
                url: '/quest/ajax/get-question-snippet',
                type: 'POST',
                data: {
                    'questionType': $('#select-question-type').val(),
                    'questionText': $("#question-text").val(),
                    'questionMandatory': $("#question-mandatory").is(":checked"),
                    'predefinedValues' : $("#number-values").is(":checked"),
                    'grid' : $("#grid").is(":checked"),
                    'doubleHandles' : $("#double-handles").is(":checked"),
                    'valuesForPredefined' : $("#values-for-predefined").val(),
                    'minValue' :$("#min-number").val(),
                    'maxValue' :$("#max-number").val(),
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

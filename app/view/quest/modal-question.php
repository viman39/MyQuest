<div id="modal-create-question" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-fw">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title-create-question">Create Question</h4>
            </div>
            <div class="modal-body" id="modal-content-create-question">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="select-question-type">Question Type</label>
                            <select class="form-control select2" name="questionType" id="select-question-type">
                                <option value="0">Select</option>
                                <option value="text">Text</option>
                                <option value="longtext">Longtext</option>
                                <option value="number">Number</option>
                                <option value="checkbox">Multiple answer</option>
                                <option value="radio">Radio answer</option>
                                <option value="select">Dropdown select</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="question-settings">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="question-snippet">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                    <i class="fa fa-times-circle fa-fw"></i> Close
                </button>
                <button type="button" class="btn btn-primary btn-md d-none" id="add-question-modal">
                    <i class="fas fa-plus-circle fa-fw"></i> Add
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function loadSettings(){
        var questionTypeSelector = $('#select-question-type')
        var questionTypeSelectValue = questionTypeSelector.val()

        if ( questionTypeSelectValue != 0 ){
            $.ajax({
                url: '/quest/ajax/get-question-settings',
                type: 'POST',
                data: {
                    'questionType'      : $('#select-question-type').val(),
                },
            }).done(function(response){
                $('#question-settings').html(response)
            });
        } else {
            $('#question-settings').html("");
        }

        addQuestionModalButtonClass("addClass", "d-none")
        $('#question-snippet').html("");
    }

    function addQuestionModalButtonClass(action, clas){
        if ( action == "addClass" ){
            $("#add-question-modal").addClass(clas)
        } else if ( action == "removeClass" ){
            $("#add-question-modal").removeClass(clas)
        }
    }

    $('#select-question-type').select2({
        minimumResultsForSearch: -1
    })

    $('#add-question-button').click(function(){
        var modalCreateQuestion = $('#modal-create-question')

        modalCreateQuestion.modal({show: true});

        loadSettings()

        return false;
    });

    $('#select-question-type').change(function(){
        loadSettings()
    });

    $('#add-question-modal').click(function(){
        $.ajax({
            url: '/quest/ajax/add-question',
            type: 'POST',
            data: {
                // all questions
                'questionType'      : $('#select-question-type').val(),
                'questionText'      : $("#question-text").val(),
                'questionMandatory' : $("#question-mandatory").is(":checked"),
                'imageBase64'       : $("#image-base64").val(),
                // text
                'answerLength'      : $("#answer-length").val(),
                // longtext
                'boxHeight'         : $("#box-height").val(),
                'minCharacters'     : $("#min-characters").val(),
                'maxCharacters'     : $("#max-characters").val(),
                // number
                'predefinedValues'  : $("#number-values").is(":checked"),
                'grid'              : $("#grid").is(":checked"),
                'doubleHandles'     : $("#double-handles").is(":checked"),
                'valuesForPredefined': $("#values-for-predefined").val(),
                'minValue'          :$("#min-number").val(),
                'maxValue'          :$("#max-number").val(),
                // checkbox
                'checkboxTexts'     : $("#checkbox-texts").val(),
                'checkboxOther'     : $("#include-option-other").is(":checked"),
                // radio
                'radioTexts'        : $("#radio-texts").val(),
                // select
                'selectTexts'       : $("#select-texts").val(),
                'includeSelect'     : $("#include-select").is(":checked"),
                'searchBox'         : $("#select-search-box").is(":checked"),
                // date
                'showTime'          : $("#date-include-time").is(":checked"),
                'useRange'          : $("#date-use-range").is(":checked"),
            },
        }).done(function(response){
            $('#questionnaire-body').html(response);
            $('#modal-create-question').modal('toggle');
        });
    });
</script>

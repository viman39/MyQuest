<div class="row">
    <div class="col-md-12">
        <?php
            $iterator = 1;

            foreach ( $argv['questions'] as $key => $question ){
                if ( $this->lib->extern->session->user['role'] == 'user' ){
                    ?>
                        <div class="row">
                            <div class="col-md-1">
                                <a href=""
                                   class="btn-link text-danger ml-1 delete-question"
                                   onclick="deleteQuestion('<?=$key?>'); return false;"><h4><i class="fas fa-times-circle text-red"></i></h4></a>
                            </div>
                            <div class="col-md-11">

                    <?php
                }

                $this->loadView('quest/question/'.@$question['questionType'], array(
                    'key' => $key,
                    'iterator' => $iterator,
                    'question' => $question,
                    'error' => @$argv['error'][$key],
                    'value' => @$argv['post'][$key],
                    'post' => @$argv['post']
                ));
                $iterator++;

                if ( $this->lib->extern->session->user['role'] == 'user' ){
                    ?>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</div>


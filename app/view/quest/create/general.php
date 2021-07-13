<?php $this->loadView('_header', $argv);?>

<section class="content-header">
    <div class="container-fluid">
        <h1>
            <i class="fas fa-hat-wizard fa-fw"></i> Quest Creator
        </h1>
    </div>
</section>

<section class="content">
    <?php
//    __sys_console($argv['post'])
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/quest/create/index" method="post" id="formGeneral">
                    <div class="card card-success card-outline">
                        <div class="card-header with-border">
                            <?php
                            $this->loadView('quest/create/menu', array(
                                'menu' => 'general'
                            ));
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="input-quest-name">Name<span class="text-red">*</span></label>
                                        <input id="input-quest-name" type="text" class="form-control form-control-sm<?=( ( isset($argv['error']['name']) ) ? ' is-invalid' : '' )?>" name="name" value="<?=( ( isset($argv['post']['name']) ) ? $argv['post']['name'] : '' )?>">
                                        <?=( ( isset($argv['error']['name']) ) ? '<small class="text-red">'.$argv['error']['name'].'</small>' : '' )?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="input-quest-gold">Reward <i class="fa fa-info-circle text-primary class-tooltip" data-toggle="tooltip" data-placement="top" title="The amount of coins you give an adventurer for solving your quest, the more coins you offer the more adventurers you attract!"></i></label>
                                        <input id="input-quest-gold" type="number" class="form-control form-control-sm<?=( ( isset($argv['error']['reward']) ) ? ' is-invalid' : '' )?>" name="reward" value="<?=( ( isset($argv['post']['reward']) ) ? $argv['post']['reward'] : '0' )?>">
                                        <?=( ( isset($argv['error']['reward']) ) ? '<small class="text-red">'.$argv['error']['reward'].'</small>' : '' )?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="details">
                                            Details <small>(what is this questionnaire about)</small>
                                        </label>
                                        <textarea class="form-control" name="details" id="details" rows="2" style="resize: none"><?=@$argv['post']['details']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="shuffle-questions">Shuffle questions<span class="text-red">*</span></label>
                                        <select class="form-control select2" name="shuffle" id="shuffle-questions">
                                            <option value="no" <?=( (isset($argv['post']['shuffle']) and $argv['post']['shuffle'] == 'no') ? 'checked' : ''  )?>>No</option>
                                            <option value="yes" <?=( (isset($argv['post']['shuffle']) and $argv['post']['shuffle'] == 'yes') ? 'checked' : ''  )?>>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="availability">Quest availability<span class="text-red">*</span></label>
                                        <select class="form-control select2" name="availability" id="availability">
                                            <option value="all" <?=( (isset($argv['post']['availability']) and $argv['post']['availability'] == 'all') ? 'checked' : ''  )?>>Anyone can access your Quest based on your filters</option>
                                            <option value="code" <?=( (isset($argv['post']['availability']) and $argv['post']['availability'] == 'code') ? 'checked' : ''  )?>>Create a unique code that let's anyone having the code access your Quest (account isn't necessary) </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row availability-code <?=((!isset($argv['availability']) or $argv['availability'] != 'code' ) ? 'd-none' : '')?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">This will be your unique code </label>
                                        <input id="code-visible" type="text" class="form-control" name="code" disabled="" value="<?=@$argv['post']['code']?>">
                                        <input id="code-hidden" type="hidden" name="code" value="<?=@$argv['post']['code']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row availability-all <?=((isset($argv['availability']) and $argv['availability'] != 'all') ? 'd-none' : '')?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country filter <small>(leave empty to select all countries)</small></label>
                                        <?php
                                            $this->loadView('/components/select/country', array('selected' => @$argv['post']['country'][0], 'multiple' => 'yes'))
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row availability-all <?=((isset($argv['availability']) and $argv['availability'] != 'all') ? 'd-none' : '')?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="industry">Job activity filter <small>(leave empty to select all job activities)</small></label>
                                        <?php
                                        $this->loadView('/components/select/industry', array('selected' => @$argv['post']['industry'][0], 'multiple' => 'yes'))
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row availability-all <?=((isset($argv['availability']) and $argv['availability'] != 'all') ? 'd-none' : '')?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="salary">Salary filter <small>(leave empty to select all salary ranges)</small></label>
                                        <?php
                                        $this->loadView('/components/select/salary', array('selected' => @$argv['post']['salary'][0], 'multiple' => 'yes'))
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer with-border">
                            <a href="/quest/create/cancel" id="btnCancel" class="btn bg-gradient-danger btn-sm btn-cancel" data-redirect="/quest/create/cancel"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
                            <a id="btnBack" class="btn btn-secondary btn-sm disabled"><i class="fa fa-arrow-circle-left fa-fw"></i> Back</a>
                            <a id="btnNext" href="/quest/create/index" class="btn bg-gradient-primary btn-sm text-white"><i class="fa fa-arrow-circle-right fa-fw"></i> Next</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function uuidv4() {
        return 'xxxx34xxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    $(document).ready(function() {
        $('.class-tooltip').tooltip({
            placement: 'auto'
        })

        $('#shuffle-questions').select2({
            minimumResultsForSearch: -1
        });

        $('#availability').select2({
            minimumResultsForSearch: -1
        }).change(function(){
            var selectValue = $(this).val()
            var avalabilityAll = $('.availability-all')
            var avalabilityCode = $('.availability-code')

            if ( selectValue == 'all' ){
                avalabilityAll.removeClass('d-none')
                avalabilityCode.addClass('d-none')
            } else if ( selectValue == 'code' ){
                avalabilityAll.addClass('d-none')
                avalabilityCode.removeClass('d-none')

                var code = uuidv4()

                $('#code-hidden').val(code)
                $('#code-visible').val(code)
            }
        });

        $('#country').select2()
        $('#industry').select2()
        $('#salary').select2()

        $('#input-quest-gold').change(function(){
            var val = parseInt($(this).val())
            if ( val < 0 ){
                val = val * -1
            }
            $(this).val(val)
        })

        $('#btnNext').click(function(){
            $('#btnCancel').addClass('disabled');
            $('#btnNext').addClass('disabled');
            $('#formGeneral').submit();
            return false;
        });
    });
</script>

<?php $this->loadView('_footer', $argv);?>

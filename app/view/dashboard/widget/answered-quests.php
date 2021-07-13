<div class="card card-widget card-with-table">
    <div class="card-header" id="answered-quests-header">
        <h3 class="card-title">
            <i class="fa fa-chart-line text-green fa-fw"></i>
            Amount of quests solved per day
        </h3>
        <div class="card-tools" id="answered-quests-tools">
        	<span id="answered-quests-loader">
        		<i class="fa fa-spinner fa-spin fa-fw"></i>
        	</span>
            <span id="answered-quests-buttons" style="display:none;">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </span>
        </div>
    </div>
    <div class="card-body" style="display:none;" id="answered-quests-results"></div>
</div>
<script>
    $(function () {
        $.ajax({
            url: '/dashboard/answered-quests',
            async: true
        }).done(function(html){
            if ( html != '' ){
                $('#answered-quests-header').addClass('with-border');
                $('#answered-quests-results').html(html).fadeIn();
                $('#answered-quests-loader').hide();
                $('#answered-quests-buttons').show();
            }else{
                $('#answered-quests-results').hide();
                $('#answered-quests-buttons').hide();
                $('#answered-quests-loader').html('<span class="text-green">No Results</span>');
            }
        });
    });
</script>
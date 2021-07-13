<div class="card card-widget card-with-table">
    <div class="card-header" id="most-answered-quests-header">
        <h3 class="card-title">
            <i class="fa fa-chart-pie text-green fa-fw"></i>
            Most Answered Quests
        </h3>
        <div class="card-tools" id="most-answered-quests-tools">
        	<span id="most-answered-quests-loader">
        		<i class="fa fa-spinner fa-spin fa-fw"></i>
        	</span>
            <span id="most-answered-quests-buttons" style="display:none;">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </span>
        </div>
    </div>
    <div class="card-body" style="display:none;" id="most-answered-quests-results"></div>
</div>
<script>
    $(function () {
        $.ajax({
            url: '/dashboard/most-answered-quests',
            async: true
        }).done(function(html){
            if ( html != '' ){
                $('#most-answered-quests-header').addClass('with-border');
                $('#most-answered-quests-results').html(html).fadeIn();
                $('#most-answered-quests-loader').hide();
                $('#most-answered-quests-buttons').show();
            }else{
                $('#most-answered-quests-results').hide();
                $('#most-answered-quests-buttons').hide();
                $('#most-answered-quests-loader').html('<span class="text-green">No Results</span>');
            }
        });
    });
</script>
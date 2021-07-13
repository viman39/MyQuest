<div class="card card-widget card-with-table">
    <div class="card-header" id="answers-received-header">
        <h3 class="card-title">
            <i class="fa fa-chart-line text-green fa-fw"></i>
            Answers received
        </h3>
        <div class="card-tools" id="answers-received-tools">
        	<span id="answers-received-loader">
        		<i class="fa fa-spinner fa-spin fa-fw"></i>
        	</span>
            <span id="answers-received-buttons" style="display:none;">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </span>
        </div>
    </div>
    <div class="card-body" style="display:none;" id="answers-received-results"></div>
</div>
<script>
    $(function () {
        $.ajax({
            url: '/dashboard/answers-received',
            async: true
        }).done(function(html){
            if ( html != '' ){
                $('#answers-received-header').addClass('with-border');
                $('#answers-received-results').html(html).fadeIn();
                $('#answers-received-loader').hide();
                $('#answers-received-buttons').show();
            }else{
                $('#answers-received-results').hide();
                $('#answers-received-buttons').hide();
                $('#answers-received-loader').html('<span class="text-green">No Results</span>');
            }
        });
    });
</script>
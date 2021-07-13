<div class="card card-widget card-with-table">
    <div class="card-header" id="suggested-quest-header">
        <h3 class="card-title">
            <i class="fas fa-dragon text-green fa-fw"></i>
            Suggested Adventure
        </h3>
        <div class="card-tools" id="suggested-quest-tools">
        	<span id="suggested-quest-loader">
        		<i class="fa fa-spinner fa-spin fa-fw"></i>
        	</span>
            <span id="suggested-quest-buttons" style="display:none;">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </span>
        </div>
    </div>
    <div class="card-body" style="display:none;" id="suggested-quest-results"></div>
</div>
<script>
    $(function () {
        $.ajax({
            url: '/dashboard/suggested-quest',
            async: true
        }).done(function(html){
            if ( html != '' ){
                $('#suggested-quest-header').addClass('with-border');
                $('#suggested-quest-results').html(html).fadeIn();
                $('#suggested-quest-loader').hide();
                $('#suggested-quest-buttons').show();
            }else{
                $('#suggested-quest-results').hide();
                $('#suggested-quest-buttons').hide();
                $('#suggested-quest-loader').html('<span class="text-green">No Results</span>');
            }
        });
    });
</script>
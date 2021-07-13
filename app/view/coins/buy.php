<form action="/coins/buy" method="post" id="frmBuy">
    <div class="card card-outline card-success">
        <div class="card-header">
            Add coins to your account
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <input name="value" type="hidden" id="coins-value-eur-hidden" value="1.4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="coins-to-buy">
                                    Buy
                                    <span class="badge badge-danger" id="span-badge"><i class="fas fa-coins"></i> <span id="coins-value">100</span></span>
                                    with
                                    <span id="coins-value-eur">1.4</span> &euro;
                                    (<span id="value-per-coins">1.4</span> &euro;/100<i class="fas fa-coins"></i>)
                                </label>
                                <input type="text" id="coins-to-buy" name="coinsToBuy" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer with-border">
            <a id="btnFinish" href="" class="btn btn-primary btn-sm text-white"><i class="fa fa-coins fa-fw"></i> Add coins!</a>
        </div>
    </div>
</form>

<script>
    $('#btnFinish').click(function(){
        $('#btnFinish').addClass('disabled');
        $('#btnCancel').addClass('disabled');
        $('#frmBuy').submit();
        return false;
    });

    $("#coins-to-buy").ionRangeSlider({
        skin: "round",
        min: 100,
        max: 100000,
        step: 100,
        grid: true,
    }).change(function(){
        var value = parseInt($(this).val())
        var spanBadge = $("#span-badge")
        var valueEur = $("coins-value-eur")
        var goldMultiplier

        if ( value < 10000 ){
            spanBadge.addClass('badge-danger')
            spanBadge.removeClass('badge-warning')
            spanBadge.removeClass('badge-success')
            goldMultiplier = 1.4
        } else if ( value < 50000 ){
            spanBadge.removeClass('badge-danger')
            spanBadge.addClass('badge-warning')
            spanBadge.removeClass('badge-success')
            goldMultiplier = (1.2 + 0.2 * (1-(value-10000)/40000) ).toFixed(3)
        } else {
            spanBadge.removeClass('badge-danger')
            spanBadge.removeClass('badge-warning')
            spanBadge.addClass('badge-success')
            goldMultiplier = 1.2
        }

        valueEur = value/100*goldMultiplier
        valueEur = parseFloat(valueEur.toFixed(1))

        $('#coins-value').text(value)
        $('#coins-value-eur').text(valueEur)
        $('#value-per-coins').text(goldMultiplier)
        $('#coins-value-eur-hidden').val(valueEur)
    });
</script>
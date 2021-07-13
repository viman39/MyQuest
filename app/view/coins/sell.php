<form action="/coins/sell" method="post" id="frmBuy">
    <div class="card card-outline card-success">
        <div class="card-header">
            Sell coins
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <input name="value" type="hidden" id="coins-value-eur-hidden" value="1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="coins-to-buy">
                                    Sell
                                    <span class="badge badge-success"><i class="fas fa-coins"></i> <span id="coins-value">100</span></span>
                                    for
                                    <span id="coins-value-eur">1</span> &euro;
                                </label>
                                <input type="text" id="coins-to-sell" name="coinsToSell" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer with-border">
            <a id="btnFinish" href="" class="btn btn-primary btn-sm text-white"><i class="fa fa-coins fa-fw"></i> Sell coins!</a>
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

    $("#coins-to-sell").ionRangeSlider({
        skin: "round",
        min: 100,
        max: <?=$argv['user']['coins']-$argv['user']['coins']%100?>,
        step: 100,
        grid: true,
    }).change(function(){
        var value = parseInt($(this).val())

        $('#coins-value').text(value)
        $('#coins-value-eur').text(value/100)
        $('#coins-value-eur-hidden').val(value/100)
    });
</script>
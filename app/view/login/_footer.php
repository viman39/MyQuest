<script>
    $(document).ready(function(){
        $.ajax({
            url: '/index/check-for-notification',
            dataType: 'json',
        }).done(function(response){
            if ( response !== 'false' ){
                toastr[response.notificationType](response.notificationText);
            }
        })
    })
</script>
</html>

    </div>
    <footer class="main-footer">
        <strong>&copy; 2021-<?=date('Y')?> <a href="http://myquest.localhost">myquest.com</a>.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0-alpha
        </div>
    </footer>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url: '/index/check-for-notification',
            dataType: 'json',
        }).done(function(response){
            if ( response !== 'false' ){
                toastr[response.notificationType](response.notificationText);
            }
        })

        $(document).on('click','.btn-cancel',function(){
            var url = $(this).data('redirect');
            $.confirm({
                theme: 'modern', // 'material', 'bootstrap'
                draggable: false,
                dragWindowBorder: false,
                title: 'Are you sure?',
                content: 'Any unsaved data will be lost!',
                type: 'red',
                typeAnimated: true,
                icon: 'fa fa-times',
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-green',
                        action: function(){
                            var url = $(".btn-cancel").data('redirect');

                            console.log(url);

                            window.location.href = url;
                        }
                    },
                    close: {
                        text: 'Cancel',
                        btnClass: 'btn-red',
                        action: function(){
                        }
                    }
                }
            });
            return false;
        });

        $(document).on('click','.btn-delete',function(){
            var url = $(this).data('redirect');
            $.confirm({
                theme: 'modern', // 'material', 'bootstrap'
                draggable: false,
                dragWindowBorder: false,
                title: 'Are you sure?',
                content: "This item will be deleted!",
                type: 'red',
                typeAnimated: true,
                icon: 'fa fa-question-circle',
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-green',
                        action: function(){
                            window.location.href = url;
                        }
                    },
                    close: {
                        text: 'Cancel',
                        btnClass: 'btn-red',
                        action: function(){
                        }
                    }
                }
            });
            return false;
        });

    });
</script>
</body>
</html>
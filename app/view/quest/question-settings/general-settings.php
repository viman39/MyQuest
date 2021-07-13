<hr>
<div class="row">
    <div class="col-md-12">
        <i class="fas fa-cog"></i> Question Settings
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="question-text">
                Question text:
            </label>
            <textarea class="form-control snippet-loader-<?=$argv['post']['questionType']?>" id="question-text" rows="2"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input class="snippet-loader-<?=$argv['post']['questionType']?>" type="checkbox" id="question-mandatory">
            <label for="question-mandatory"> Make question mandatory</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="image"> Do you want to add a photo? Upload one here!</label>
            <input  type="file" id="image" accept="image/png, image/jpeg" onchange="loadImage(this)">
        </div>
    </div>
</div>

<input type="hidden" value="" id="image-base64">

<script>
    function loadImage(element){
        try{
            var file = element.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#image-base64').val(reader.result)
            }
            reader.readAsDataURL(file);
        } catch (e) {
            $('#image-base64').val("")
        }
    }
</script>
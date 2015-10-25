@extends('layouts.backend')

@section('content')

<div class="manage_file">
    <iframe class="file-frame" frameborder="0" src="" style="width: 100%; min-height: 500px; height: auto;"> </iframe>
</div>

<script>
    (function($){
        $(document).ready(function(){
           $('iframe.file-frame').attr('src', '/plugin/filemanager/dialog.php?type=1'); 
        });
    })(jQuery);
</script>
@stop

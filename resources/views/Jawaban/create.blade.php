@extends("layout.master")

@push('head-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section("content")
<div class="container">
    <div>
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
        </ol>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whooops! </strong> There where some problems with your input.<br>
        <ul>
            @foreach($errors as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">Input Data jawaban</div>
                <div class="card-body">
                    <!-- route pertanyaan store -->
                    <form action="/jawaban/create/{{$id}}" method="post">
                        {{csrf_field()}}
                        @csrf
                        <div class="form-group">

                            <!-- <input type="text" name="isi" id="isi" class="form-control"> -->
                            <textarea name="isi" class="form-control my-editor">{!! old('isi', $isi ?? '') !!}</textarea>

                            <input type="hidden" name="pertanyaan_id" id="pertanyaan_id" class="form-control" value="{{$id}}">
                        </div>
                        <div class="col-md-12">
                            <!-- dashboard -->
                            <a href="/pertanyaan/{{$id}}" class="btn btn-sm btn-success">Back</a>
                            <button type="submit" class="btn btn-sm btn-primary" id="trigger-swal">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let triggerSwal = document.getElementById('trigger-swal');
    triggerSwal.addEventListener('click', () => {
        swal({
            icon: "success",
            text: "Berhasil"
        })
    })
</script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush
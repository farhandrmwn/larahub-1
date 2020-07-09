@extends("layout.master")

@section("content")
<div class="container">

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
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-5 mt-2">
                                <label for="inputJudl">Judul</label>
                                <input type="text" name="judul" id="inputJudul" class="form-control">
                            </div>
                            <div class="form-group col-md-5 mt-2">
                                <label for="inputIsi">Tags</label>
                                <input type="text" name="tags" id="inputTags" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputPertanyaan">Pertanyaan</label>
                                <input type="text" name="isi" id="inputIsi" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <!-- dashboard -->
                            <a href="../" class="btn btn-sm btn-success">Back</a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <form action="/jawaban/create/{{$id}}" method="post">
                        {{csrf_field()}}
                        @csrf
                        <div class="form-group">

                            <input type="text" name="isi" id="isi" class="form-control">
                            <input type="hidden" name="pertanyaan_id" id="pertanyaan_id" class="form-control" value="{{$id}}">
                        </div>
                        <div class="col-md-12">
                            <!-- dashboard -->
                            <a href="/pertanyaan/{{$id}}" class="btn btn-sm btn-success">Back</a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
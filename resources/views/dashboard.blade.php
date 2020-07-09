@extends("layout.master")

@section("content")
<div class="container">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <div class="card">
    <button type="button" class="btn btn-primary"><a href="/pertanyaan/create" style="color:white;">Buat Pertanyann</a></button>
  </div>

  @foreach($pertanyaan as $ask)

  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><a href="/pertanyaan/{{$ask->id}}">{{$ask->judul}}</a></h3>

      <div class="card-tools">
        <form action=<?= "/pertanyaan/" . $ask->id . "/vote/up" ?> method="POST" style="display:inline">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <button type="submit" class="btn btn-success">UP</button>
        </form>
        <form action=<?= "/pertanyaan/" . $ask->id . "/vote/down" ?> method="POST" style="display:inline">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <button type="submit" class="btn btn-danger">DOWN</button>
        </form>


      </div>
    </div>
    <div class="card-body">
      <p>
        {{$ask->isi}}
      </p>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Dibuat oleh user (...)
    </div>
    <!-- /.card-footer-->
  </div>

  @endforeach
</div>

@endsection
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
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
    <button type="button" class="btn btn-primary"><a href="/pertanyaan/create" style="color:white;">Buat Pertanyann</a></button>
    </div>
	<div class="card">
        <div class="card-header">
          <h3 class="card-title">Judul Pertanyaan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-success">UP</button>
            <button type="button" class="btn btn-danger">DOWN</button>
          </div>
        </div>
        <div class="card-body">
          Isi pertanyaan
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
</div>

@endsection
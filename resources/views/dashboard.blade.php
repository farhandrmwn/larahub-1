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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <button type="button" class="btn btn-primary"><a href="/pertanyaan/create" style="color:white;">Buat Pertanyann</a></button>
    </div>

    @foreach($pertanyaan as $ask)

    <div class="card">
        <div class="card-header">
            <a class="card-title" href="/pertanyaan/{{$ask->id}}">
                <h4>{{$ask->judul}}</h4>
            </a>

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
        <!-- isidengantag -->
        <?php
        $tagtny = explode(',', $ask->tag);
        $tagtny1 = [];

        for ($i = 0; $i <  count($tagtny); $i++) {
            $tagtny1[$i] = $tagtny[$i];
        }
        ?>
        @foreach($tagtny1 as $tag)
        <button class="btn btn-default btn-sm"> {{$tag}} </button>
        @endforeach
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>

    @endforeach
</div>

@endsection
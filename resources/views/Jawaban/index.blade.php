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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$ask->judul}}</h3>
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
            <p>{{ $ask->isi }}</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Beri Komentar
            </button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <p>{{ count($listKomentarPertanyaan) }} Komentar</p>
            @foreach($listKomentarPertanyaan as $komentarPertanyaan)
            <span class="text-primary">{{ $komentarPertanyaan->user->name }}</span>
            <p>{{ $komentarPertanyaan->isi }}</p>
            @endforeach
        </div>
        <!-- /.card-footer-->
    </div>

    <h3>Jawaban</h3>
    <div class="card">
        <button type="button" class="btn btn-primary"><a href="/jawaban/create/{{$ask->id}}" style="color:white;">Buat Jawaban Kamu</a></button>
    </div>
    @foreach($ans as $data)
    <div class="card">
        <div class="card-body">
            <!-- <h5 class="card-title">AnsID: {{ $data->id }}</h5> -->
            <p class="card-text">{{ $data->isi }}</p>
            <form action=<?= "/jawaban/" . $data->id . "/vote/up" ?> method="POST" style="display:inline">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-success">UP</button>
            </form>
            <form action=<?= "/jawaban/" . $data->id . "/vote/down" ?> method="POST" style="display:inline">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-danger">DOWN</button>
            </form>
        </div>
        <div class="card-footer">
            @foreach($listKomentarJawaban as $komentarJawaban)
            @if($komentarJawaban->jawaban_id === $data->id)
            <span class="text-primary">{{ $komentarJawaban->user_name }}</span>
            <p>{{ $komentarJawaban->komentar_isi }}</p>
            @endif
            @endforeach
        </div>
    </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Komentar anda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="isi" class="col-form-label">Komentar:</label>
                        <textarea class="form-control" name="isi" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

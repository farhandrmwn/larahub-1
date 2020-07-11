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
            <span class="text-primary d-block">{{ $pertanyaan->user->name }}</span>
            <h3 class="card-title">{{$pertanyaan->judul}}</h3>
            <div class="card-tools">
                <form action=<?= "/pertanyaan/" . $pertanyaan->id . "/vote/up" ?> method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success">UP</button>
                </form>
                <form action=<?= "/pertanyaan/" . $pertanyaan->id . "/vote/down" ?> method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-danger">DOWN</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p>{{ $pertanyaan->isi }}</p>

            <?php
            $tagtny = explode(',', $pertanyaan->tag);
            $tagtny1 = [];

            for ($i = 0; $i <  count($tagtny); $i++) {
                $tagtny1[$i] = $tagtny[$i];
            }
            ?>
            <div class="m-2">
                @foreach($tagtny1 as $tag)
                <button class="btn btn-default btn-sm"> #{{$tag}} </button>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#komenpertanyaan">
                Beri Komentar
            </button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <p>{{ count($pertanyaan->komentar) }} Komentar</p>
            @foreach($pertanyaan->komentar as $komentarPertanyaan)
            @if($komentarPertanyaan->jawaban_id === NULL)
            <span class="text-primary">{{ $komentarPertanyaan->user->name }}</span>
            <p>{{ $komentarPertanyaan->isi }}</p>
            @endif
            @endforeach
        </div>
        <!-- /.card-footer-->
    </div>

    <h3>Jawaban</h3>
    <div class="card">
        <button type="button" class="btn btn-primary"><a href="/jawaban/create/{{$pertanyaan->id}}" style="color:white;">Buat Jawaban Kamu</a></button>
    </div>
    @foreach($jawaban as $data)
    <div class="card">
        <div class="card-body">
            <span class="text-primary">{{ $data->user->name }}</span>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#komenjawaban-{{$data->id}}">
                Beri Komentar
            </button>
        </div>
        <div class="card-footer">
            <p>{{ count($data->komentar) }} Komentar</p>
            @foreach($data->komentar as $komentar)
            <span class="text-primary">{{ $komentar->user->name }}</span>
            <p>{{$komentar->isi}}</p>
            @endforeach
        </div>
        <div class="modal fade" id="komenjawaban-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" action="./{{ $pertanyaan->id }}/komentar" method="POST">
                    <input type="hidden" name="jawaban_id" value="{{$data->id}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Jawaban</h5>
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
                        <button type="submit" class="btn btn-primary">+ Komentar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Komentar Pertanyaan -->
    <div class="modal fade" id="komenpertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="./{{ $pertanyaan->id }}/komentar" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pertanyaan</h5>
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

<!-- Modal Komentar Jawaban-->

@endsection
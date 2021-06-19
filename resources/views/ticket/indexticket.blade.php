@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Beli ticket: {{ $movie->movie_title }}</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('ticket/save') }}">
                @csrf
                <input type="hidden" name="theater_id" value="{{ $movie->theater_id }}">
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                @if($movie->jadwal)
                    @php
                        $times = explode(',', $movie->jadwal);
                    @endphp
                    <h5>Pilih jadwal</h5>
                    @foreach($times as $index=>$time)

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jadwal" id="exampleRadios{{$index}}" value="{{$time}}" required>
                            <label class="form-check-label" for="exampleRadios{{$index}}">
                                {{ $time }}
                            </label>
                        </div>
                    @endforeach
                @endif
                <div class="mb-3">
                    <label for="tersedia" class="form-label" >Tiket tersedia</label>
                    <input type="number" class="form-control" id="tersedia" aria-describedby="emailHelp" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Jumlah tiket</label>
                    <input type="number" id="jumlah" name="kuantitas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3" id="harga">
                    <h4>Total : </h4>
                </div>
                <button type="submit" class="btn btn-info" id="beli">Beli</button>
            </form>
        </div>
    </div>
    <script>
        $(function()
        {
            var harga = {{$movie->harga}}
            $("#jumlah").on("input", function() {
                if (/^0/.test(this.value)) {
                    this.value = this.value.replace(/^0/, "")
                }
                var max = parseInt($(this).attr('max'));
                if($(this).val() > max)
                {
                    $(this).val(max)
                }
                var tiket = $('#jumlah').val();
                var total = harga * tiket
                $('#harga').empty();
                $('#harga').html(`
                <h4>Total : ${total.toLocaleString()}</h4>
               `);
            })

            $('input:radio[name=jadwal]').on('change', function ()
            {
                var time = $(this).val()
                $.ajax({
                    url: `{{url('/getTicket')}}/{{$movie->id}}/${time}`,
                    method: 'get',
                    success: (res) => {
                        $('#tersedia').val(res);
                        $('#jumlah').attr('max', res);
                        $('#beli').removeAttr('disabled')
                        if(res == 0)
                        {
                            $('#beli').attr('disabled', 'disabled')
                        }
                    },
                    error: (err) => {
                        console.log(err)
                    }
                })
            })
        })
    </script>
@endsection

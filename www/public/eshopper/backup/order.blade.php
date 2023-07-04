{{-- Untuk menampilkan array dalam session jika data lebih dari 1. Keren --}}
<td>
    @foreach ($cart as $id => $details)
        {{ $details['nama'] }}
        @if (!$loop->last)
            <br>
        @endif
    @endforeach
</td>
<td class="text-center">
    @foreach ($cart as $id => $details)
        x {{ $details['quantity'] }}
        @if (!$loop->last)
            <br>
        @endif
    @endforeach
</td>

<input type="hidden" name="nama" value="{{ $dataorder->nama }}">
<input type="hidden" name="username" value="{{ $dataorder->username }}">
<input type="hidden" name="email" value="{{ $dataorder->email }}">
<input type="hidden" name="nomerhp" value="{{ $dataorder->nomerhp }}">
<input type="hidden" name="alamat" value="{{ $dataorder->alamat }}">
<input type="hidden" name="rtrw" value="{{ $dataorder->rtrw }}">

@extends('layouts.app')
@section('content')
  {{-- <table class="table"> --}}
      @foreach ($data as $p)
      {{-- <tr class="letak"> --}}
        <div class="letak">
          @php
              $qrcode = '<img src="data:image/svg;base64,'. base64_encode(QrCode::size(100)->generate($p->link .= $p->code)) .'">';
              echo '<p>'.$qrcode.'</p><p>'.$p['code'].'</p>';
          @endphp
        </div>
      {{-- </tr> --}}
      @endforeach
  {{-- </table> --}}
@endsection
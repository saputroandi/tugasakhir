@extends('layout')

@section('content')
{{-- {{ dd(count($payments)) }} --}}
{{-- {{ dd(Auth::user()->payments->first()->payment_status) }} --}}
  <div class="flex items-center justify-center flex-col flex-grow gap-10 max-h-full my-6">
    @if (Session::get("success"))
    <div class="flex justify-center w-11/12 py-3 bg-green-500 opacity-75">
      <span class="text-xs text-center">{{ Session::get("success") }}</span>
    </div>
    @endif
    @if (Session::get("fail"))
    <div class="flex justify-center w-11/12 py-3 bg-red-500 opacity-75">
      <span class="text-xs text-center">{{ Session::get("fail") }}</span>
    </div>
    @endif
    <div class="flex flex-col justify-center w-2/3 p-6 rounded-md shadow-lg bg-buatbgkomponen">
      
      <div class="w-full mb-3">
        <p class="font-semibold text-2xl text-center">Pembayaran User</p>
      </div>
      
      <div class="flex w-full p-1 flex-col items-center gap-3 rounded bg-buatbody">
        @if (count($payments) > 0)
        <div class="hidden md:flex w-full py-2 border-b-2 border-black">
          <p class="w-1/6 font-medium text-center">No</p>
          <p class="w-1/6 font-medium text-center">email</p>
          <p class="w-1/6 font-medium text-center">Tanggal Pembayaran</p>
          <p class="w-2/6 font-medium text-center">Bukti Pembayaran</p>
          <p class="w-1/6 font-medium text-center">Aksi</p>
        </div>
        @foreach ($payments as $payment)
        @php
            $tahun   = Str::substr($payment->payment_id, 1, 4);
            $bulan   = Str::substr($payment->payment_id, 5, 2);
            $tanggal = Str::substr($payment->payment_id, 7, 2);

        @endphp
          <div class="flex flex-col md:flex-row items-center w-full hover:bg-buatbgkomponen">
            <div class="w-1/6 p-2 hidden md:flex justify-center items-center">
              <p class="text-center">{{ $loop->iteration }}</p>
            </div>
            <div class="w-1/6 p-2 flex justify-center items-center">
              <p class="text-center">{{ $payment->user->email }}</p>
            </div>
            <div class="w-1/6 p-2 flex justify-center items-center">
              <p class="text-center">{{ $tanggal.'/'.$bulan.'/'.$tahun }}</p>
            </div>
            <div class="w-40 md:w-2/6 flex justify-center items-center">
              <div class="gambar-hover w-full aspect-w-1 aspect-h-1 bg-center bg-no-repeat bg-cover bg-white transform duration-200 hover:scale-200" style="background-image: url({{ url('storage/proof_of_payment/'.$payment->proof_of_payment) }});"></div>
            </div>
            <div class="flex flex-row md:flex-col gap-3 w-1/6 p-2 justify-center items-center">
              <div class="">
                <form action="{{ route('payment.accept', ["user" => $payment->user->user_id,'payment'=>$payment->payment_id]) }}" method="post">
                  @csrf
                  <button type="submit" class="p-2 shadow-md bg-green-500 hover:bg-green-700 rounded">Accept</button>
                </form>
              </div>
              <div class="">
                <form action="{{ route('payment.denied', ["user" => $payment->user->user_id,'payment'=>$payment->payment_id]) }}" method="post">
                  @csrf
                  <button type="submit" class="p-2 shadow-md bg-red-500 hover:bg-red-700 rounded">Denied</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
        @else
        <div class="p-2">
          <p class="text-center text-xl md:text-4xl font-bold">Tidak ada pembayaran yang perlu di konfirmasi</p>
        </div>
        @endif
        

      </div>
    </div>
  </div>
@endsection
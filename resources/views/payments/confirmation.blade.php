@extends('layout')

@section('content')
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
<div class="flex max-w-full h-screen justify-center items-center">
  <div class="flex flex-col p-4 w-10/12 bg-buatbgkomponen gap-2">
    <p class="text-center font-medium text-3xl">Konfirmasi Pembayaran</p>
    <div class="flex flex-col justify-center mx-8 border-solid border-1 border-black bg-yellow-200">
      <p class="text-red-500 font-semibold text-center">Perhatian :</p>
      <p class="font-medium text-center">Bukti pembayaran harus berbentuk gambar dengan format jpg, jpeg, png, bmp, gif, svg, or webp</p>
      <p class="font-medium text-center">Ukuran maksimal 2MB</p>
    </div>
    <form action="{{ route('payment.confirmation.save', ["user" => Auth::user()->user_id, "payment" => Auth::user()->payments->last()->payment_id]) }}" enctype="multipart/form-data" method="post">
      @csrf
        <div class="mx-8 mt-3 mb-1 opacity-60">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Email" value="{{ Auth::user()->email }}" disabled>
        </div>
        <div class="mx-8 mt-3 mb-1">
          <label for="proof_of_payment">Bukti Transfer</label>
          <input type="file" name="proof_of_payment" id="proof_of_payment" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Bukti Transfer">
          <span class="text-xs text-red-600">@error('proof_of_payment') {{ $message }} @enderror</span>
        </div>
        <div class="mx-8 mt-3 mb-2">
          <label for="note">Catatan</label>
          <textarea name="note" id="note" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Catatan Opsional" rows="5"></textarea>
          <span class="text-xs text-red-600">@error('note') {{ $message }} @enderror</span>
        </div>
      <div class="grid place-items-center mx-8">
        <button type="submit" class="w-full p-2 mb-5 bg-buatbutton font-medium rounded hover:bg-gray-600 hover:text-white">Konfirmasi</button>
      </div>
    </form>
  </div>
</div>
@endsection
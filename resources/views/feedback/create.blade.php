@extends('layout')

@section('content')
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
<div class="flex w-full h-screen justify-center items-center">
  <div class="flex flex-col p-4 w-10/12 bg-buatbgkomponen gap-2 rounded-md">
    <p class="text-center font-medium text-3xl">Feedback</p>
    <div class="flex flex-col justify-center py-2 mx-8 border-solid border-1 border-black bg-yellow-200 rounded-md">
      <p class="font-medium text-center">Feedback anda akan di kirim ke email admin</p>
    </div>
    <form action="#"  method="post">
      @csrf
        <div class="mx-8 mt-3 mb-1 opacity-60">
          <label for="email">Email User</label>
          <input type="text" name="email" id="email" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Email" value="{{ Auth::user()->email }}" disabled>
        </div>
        <div class="mx-8 mt-3 mb-1">
          <label for="email">Subject</label>
          <input type="text" name="email" id="email" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Subject">
        </div>
        <div class="mx-8 mt-3 mb-2">
          <label for="note">Catatan</label>
          <textarea name="note" id="note" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Catatan Opsional" rows="5"></textarea>
          <span class="text-xs text-red-600">@error('note') {{ $message }} @enderror</span>
        </div>
      <div class="grid place-items-center mx-8">
        <button type="submit" class="w-full p-2 mb-5 bg-green-400 font-medium rounded hover:bg-green-600 hover:text-white">Konfirmasi</button>
      </div>
      {{-- <a href="#" class="w-full p-2 mb-5 font-medium rounded bg-gray-400 hover:bg-gray-600 hover:text-white">back</button> --}}
    </form>
  </div>
</div>
@endsection
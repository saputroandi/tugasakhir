@extends('layout')

@section('content')
<div class="grid place-items-center mt-20">
  <form action="#" enctype="multipart/form-data" method="post">
    @csrf
    <div class="grid place-content-center">
      <div class="mx-8 mt-3 mb-1">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded focus:outline-none" placeholder="Email" value="{{ old("email") }}">
        <span class="text-xs text-red-600">@error('email') {{ $message }} @enderror</span>
      </div>
    </div>
    <div class="grid place-items-center mx-8">
      <button type="submit" class="w-full p-2 mb-5 bg-buatbutton font-medium rounded hover:bg-gray-600 hover:text-white">Masuk</button>
      <a href="{{ route("auth.register") }}" class="w-full p-2 mb-3 text-center font-light hover:text-white">Belum punya akun?</a>
    </div>
  </form>
</div>
@endsection
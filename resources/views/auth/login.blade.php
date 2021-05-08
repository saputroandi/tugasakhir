@extends('layout')

@section('content')
<div class="grid place-items-center">
  <div class="max-w-sm my-10 rounded-lg shadow-lg bg-buatbgkomponen">
    <div class="grid grid-flow-row place-content-center">
      <div class="grid place-content-center mt-3">
        <p class="font-semibold text-3xl">Masuk</p>
      </div>
      <div class="">
        <form action="#" method="post">
          @csrf
          <div class="grid place-content-center">
            <div class="mx-8 mt-3 mb-1">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded focus:outline-none" placeholder="Email" value="{{ old("email") }}">
            </div>
            <div class="mx-8 mb-3">
              <label for="password">Password</label>
              <input type="text" name="password" id="password" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded focus:outline-none" placeholder="Password" value="{{ old("password") }}">
            </div>
          </div>
          <div class="grid place-items-center mx-8">
            <button type="submit" class="w-full p-2 mb-5 bg-buatbutton font-medium rounded hover:bg-gray-600 hover:text-white">Masuk</button>
            <a href="{{ route("auth.register") }}" class="w-full p-2 mb-3 text-center font-light hover:text-white">Belum punya akun?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
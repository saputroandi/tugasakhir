@extends('layout')

@section('content')
<div class="grid place-items-center">
  <div class="max-w-xs my-10 rounded-lg shadow-lg bg-buatbgkomponen">
    <div class="grid grid-flow-row place-content-center">
      <div class="grid place-content-center mt-3">
        <p class="font-semibold text-3xl">Masuk</p>
      </div>
      <div class="">
        <form action="#" method="post">
          @csrf
          <div class="grid place-content-center">
            <div class="mx-10 mt-5 mb-1">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="w-72 p-2 border-2 border-buatborder bg-buatbody rounded focus:outline-none" placeholder="Email" value="{{ old("email") }}">
            </div>
            <div class="mx-10 mb-3">
              <label for="password">Password</label>
              <input type="text" name="password" id="password" class="w-72 p-2 border-2 border-buatborder bg-buatbody rounded focus:outline-none" placeholder="Password" value="{{ old("password") }}">
            </div>
          </div>
          <div class="grid place-items-center mx-10">
            <button type="submit" class="w-72 p-2 mb-5 bg-buatbutton font-medium rounded">Masuk</button>
            <a href="{{ route("auth.register") }}" class="w-72 p-2 mb-5 text-center font-light">Belum punya akun?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
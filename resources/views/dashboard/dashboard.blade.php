@extends('layout')

@section('content')
<div class="flex justify-center items-center flex-col gap-10 h-screen max-w-full bg-red-600">
  @if (Session::get("success"))
  <div class="flex justify-center mt-2 w-11/12 py-3 bg-green-500 opacity-75">
    <span class="text-xs text-center">{{ Session::get("success") }}</span>
  </div>
  @endif
  @if (Session::get("fail"))
  <div class="flex justify-center mt-2 w-11/12 py-3 bg-red-500 opacity-75">
    <span class="text-xs text-center">{{ Session::get("fail") }}</span>
  </div>
  @endif
  <p class="text-9xl">{{ Auth::user()->user_id[0] == 1 ? 'Admin' : Auth::user()->nama }}</p>
</div>
@endsection
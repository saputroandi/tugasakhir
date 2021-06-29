@extends('layout')

@section('content')
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
    <div class="bg-buatbgkomponen">
      <p>User</p>
    </div>
  </div>
@endsection
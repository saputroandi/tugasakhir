@extends('layout')

@section('content')
<div class="flex flex-col justify-center items-center h-screen max-w-full">
  <p class="w-11/12 text-center text-xl font-semibold md:text-3xl">Pilih Paket Member</p>
  <div class="flex w-11/12 gap-3 mt-8 flex-col md:flex-row">
    <div class="flex justify-center items-center p-5 gap-4 w-full flex-col border-solid border-black border-2">
      <div class="">
        <p>Paket 1 Bulan</p>
      </div>
      <div class="">
        <p class="text-center">Paket membership yang akan berlaku untuk 1 bulan</p>
      </div>
      <div class="">
        <p>Rp. 10.000,-</p>
      </div>
      <div class="shadow-md hover:shadow-none">
        <form action="{{ route('member.create', Auth::user()->user_id) }}" method="post">
          @csrf
          <input type="hidden" name="member_type" value="1">
          <button class="p-2 rounded-md bg-buatbutton">Pilih</button>
        </form>
      </div>
    </div>
    <div class="flex justify-center items-center p-5 gap-4 w-full flex-col border-opacity-40 border-black border-2 cursor-not-allowed">
      <div class="">
        <p class="opacity-60">Paket 6 Bulan</p>
      </div>
      <div class="">
        <p class="text-center opacity-60">Paket membership yang akan berlaku untuk 6 bulan</p>
      </div>
      <div class="">
        <p class="opacity-60">Rp. 40.000,-</p>
      </div>
      <div class="">
        <a href="#" class="p-2 rounded-md opacity-60 bg-buatbutton cursor-not-allowed">Pilih</a>
      </div>
    </div>
    <div class="flex justify-center items-center p-5 gap-4 w-full flex-col border-opacity-40 border-black border-2 cursor-not-allowed">
      <div class="">
        <p class="opacity-60">Paket 1 Tahun</p>
      </div>
      <div class="">
        <p class="text-center opacity-60">Paket membership yang akan berlaku untuk 1 tahun</p>
      </div>
      <div class="">
        <p class="opacity-60">Rp. 80.000,-</p>
      </div>
      <div class="">
        <a href="#" class="p-2 rounded-md opacity-60 bg-buatbutton cursor-not-allowed">Pilih</a>
      </div>
    </div>
  </div>
</div>
@endsection
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
    <div class="flex w-full justify-center items-center">
      <div class="flex flex-col p-4 w-10/12 gap-2 items-center rounded-md shadow-lg bg-buatbgkomponen">
        <div class="">
          <p class="text-3xl font-medium">List Semua Surat User</p>
        </div>
        <div class="flex flex-col w-full p-4 bg-buatbody rounded gap-3">
          {{-- header --}}
          <div class="flex w-full py-2 bg-gray-400 rounded">
            <div class="flex justify-center w-1/3">
              <p class="font-semibold">No</p>
            </div>
            <div class="flex justify-center w-1/3">
              <p class="font-semibold">Nama Surat</p>
            </div>
            <div class="flex justify-center w-1/3">
              <p class="font-semibold">Action</p>
            </div>
          </div>
          {{-- end of header --}}
          {{-- data --}}
          <div class="flex w-full hover:bg-buatbgkomponen rounded">
            <div class="flex justify-center items-center p-2 w-1/3">
              <p>1</p>
            </div>
            <div class="flex flex-col justify-center p-2 w-1/3">
              <p class="font-semibold text-xl">Surat gw</p>
              <p class="font-light text-sm">Surat pengunduran diri</p>
            </div>
            <div class="flex justify-center items-center p-2 w-1/3 gap-3">
              <a href="#" class="p-3 rounded bg-red-500">Hapus</a>
            </div>
          </div>
          {{-- end of data --}}
          {{-- data --}}
          <div class="flex w-full hover:bg-buatbgkomponen rounded">
            <div class="flex justify-center items-center p-2 w-1/3">
              <p>2</p>
            </div>
            <div class="flex flex-col justify-center p-2 w-1/3">
              <p class="font-semibold text-xl">Surat adek</p>
              <p class="font-light text-sm">Surat lamaran pekerjaan</p>
            </div>
            <div class="flex justify-center items-center p-2 w-1/3 gap-3">
              <a href="#" class="p-3 rounded bg-red-500">Hapus</a>
            </div>
          </div>
          {{-- end of data --}}
          {{-- data --}}
          <div class="flex w-full hover:bg-buatbgkomponen rounded">
            <div class="flex justify-center items-center p-2 w-1/3">
              <p>3</p>
            </div>
            <div class="flex flex-col justify-center p-2 w-1/3">
              <p class="font-semibold text-xl">Surat punya abang</p>
              <p class="font-light text-sm">Surat permohonan maaf</p>
            </div>
            <div class="flex justify-center items-center p-2 w-1/3 gap-3">
              <a href="#" class="p-3 rounded bg-red-500">Hapus</a>
            </div>
          </div>
          {{-- end of data --}}
        </div>
      </div>
    </div>
  </div>
@endsection
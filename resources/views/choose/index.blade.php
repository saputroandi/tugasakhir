@extends('layout')

@section('content')
{{-- {{ dd(Auth::user()->payments->first()->payment_status) }} --}}
  <div class="flex items-center justify-center flex-col flex-grow gap-10 max-h-full my-6">
    <div class="flex w-full justify-center items-center">
      <div class="flex flex-col p-4 w-10/12 gap-2 items-center rounded-md shadow-lg bg-buatbgkomponen">
        <div class="">
          <p class="text-3xl font-medium">Pilih Surat</p>
        </div>
        {{-- all avaible document --}}
        <div class="flex justify-center w-full rounded bg-blue-500 hover:bg-blue-600">
          <a href="{{ route('spd.create') }}" class="w-full py-2">
            <p class="text-center">Surat Pengunduran Diri</p>
          </a>
        </div>
        <div class="flex justify-center w-full rounded bg-blue-500 hover:bg-blue-600">
          <a href="#" class="w-full py-2">
            <p class="text-center">Surat Lamaran Pekerjaan</p>
          </a>
        </div>
        <div class="flex justify-center w-full rounded bg-blue-500 hover:bg-blue-600">
          <a href="#" class="w-full py-2">
            <p class="text-center">Surat Permohonan Maaf</p>
          </a>
        </div>
        <div class="flex justify-center w-full rounded bg-blue-500 hover:bg-blue-600">
          <a href="#" class="w-full py-2">
            <p class="text-center">Surat Izin Tidak Masuk Kerja</p>
          </a>
        </div>
        <div class="flex justify-center w-full rounded bg-blue-500 hover:bg-blue-600">
          <a href="{{ route('sk.create') }}" class="w-full py-2">
            <p class="text-center">Surat Kuasa</p>
          </a>
        </div>

      </div>
    </div>
  </div>
@endsection
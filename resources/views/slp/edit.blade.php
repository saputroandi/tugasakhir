@extends('layout')

@section('content')
@php
    $slugSurat = explode('_',$order->nama_order)[0];
    $namaOrder = explode('_',$order->nama_order)[1];
@endphp
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
@foreach ($order->slps as $key => $slp)
<div class="flex w-full justify-center items-center">
  <div class="flex flex-col p-4 my-5 w-10/12 bg-buatbgkomponen gap-2 rounded-md">
    <p class="text-center font-medium text-3xl">Buat Surat Lamaran Pekerjaan</p>
    <form action="{{ '/'.$slugSurat.'/'.$order->order_id }}" method="post">
      @method('PATCH')
      @csrf
      
      <div class="mx-8 mb-1 opacity-60">
        <label for="nama_order">Nama Surat</label>
        <input type="text" name="nama_order" id="nama_order" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Surat Punya Bunga" value="{{ $namaOrder }}" disabled>
        <span class="text-xs text-red-600">@error('nama_order') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="nama_slp">Nama Lengkap</label>
        <input type="text" name="nama_slp" id="nama_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Bunga" value="{{ $slp->nama_slp }}">
        <span class="text-xs text-red-600">@error('nama_slp') {{ $message }} @enderror</span>
      </div>

      <div class="flex flex-col md:flex-row gap-2 mx-8 mb-1">
        <div class="w-full md:w-1/2">
          <label for="tmpt_lahir_slp">Tempat Lahir</label>
          <input type="text" name="tmpt_lahir_slp" id="tmpt_lahir_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="Jakarta" value="{{ $slp->tmpt_lahir_slp }}">
          <span class="text-xs text-red-600">@error('tmpt_lahir_slp') {{ $message }} @enderror</span>
        </div>
        <div class="w-full md:w-1/2">
          <label for="tgl_lahir_slp">Tanggal Lahir</label>
          <input type="date" name="tgl_lahir_slp" id="tgl_lahir_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ $slp->tgl_lahir_slp }}">
          <span class="text-xs text-red-600">@error('tgl_lahir_slp') {{ $message }} @enderror</span>
        </div>
      </div>

      <div class="">
        <p class="mx-8">Jenis Kelamin</p>
      </div>
      <div class="mx-8 mb-1 w-full p-2">
        <input type="radio" name="jns_klm_slp" id="jns_klm_slp_pria" value="pria" checked>
        <label for="jns_klm_slp_pria">Pria</label>
        <input type="radio" name="jns_klm_slp" id="jns_klm_slp_wanita" value="wanita">
        <label for="jns_klm_slp_wanita">Wanita</label>
      </div>

      <div class="mx-8 mb-1">
        <label for="pendidikan_slp">Pendidikan Terakhir</label>
        <input type="text" name="pendidikan_slp" id="pendidikan_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="SMA" value="{{ $slp->pendidikan_slp }}">
        <span class="text-xs text-red-600">@error('pendidikan_slp') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="no_hp_slp">No Handphone</label>
        <input type="text" name="no_hp_slp" id="no_hp_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="08123456789" value="{{ $slp->no_hp_slp }}">
        <span class="text-xs text-red-600">@error('no_hp_slp') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="email_slp">Pendidikan Terakhir</label>
        <input type="text" name="email_slp" id="email_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="email@gmail.com" value="{{ $slp->email_slp }}">
        <span class="text-xs text-red-600">@error('email_slp') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="alamat_slp">Alamat</label>
        <input type="text" name="alamat_slp" id="alamat_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Jl. Pandu No.1 Rt.001/001 Cikini, Jakarta Pusat, DKI Jakarta." value="{{ $slp->alamat_slp }}">
        <span class="text-xs text-red-600">@error('alamat_slp') {{ $message }} @enderror</span>
      </div>

      <p class="mx-8 my-3 font-medium text-xl">Lampiran</p>

      <div class="mb-3">
        <div class="mr-8 ml-12">
          <ul class="list-decimal">
            @foreach ($slp->lampirans as $key => $lampiran)
              <li class="my-1">
                <input type="text" name="lampiran[]" class="input-lampiran w-full p-2 border-2 border-buatborder bg-buatbody rounded" value="{{ $lampiran->nama_lampiran }}">
              </li>
            @endforeach
          </ul>
          <span class="text-xs text-red-600">@error('lampiran') {{ $message }} @enderror</span>
        </div>
        <div class="ml-12 mr-8">
          <a class="block p-2 w-full tambah-lampiran rounded cursor-pointer shadow bg-buatbutton">Tambah Lampiran</a>
        </div>
      </div>

      <div class="mx-8 mb-1">
        <label for="posisi_slp">Posisi Yang Dilamar</label>
        <input type="text" name="posisi_slp" id="posisi_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Web Developer" value="{{ $slp->posisi_slp }}">
        <span class="text-xs text-red-600">@error('posisi_slp') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="penerima_slp">Penerima Surat Lamaran Pekerjaan</label>
        <input type="text" name="penerima_slp" id="penerima_slp" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="HRD PT. Adata Meta" value="{{ $slp->penerima_slp }}">
        <span class="text-xs text-red-600">@error('penerima_slp') {{ $message }} @enderror</span>
      </div>

      <div class="flex flex-col md:flex-row gap-2 mx-8">
        <div class="w-full md:w-1/2">
          <label for="tmpt_slp_terbit">Tempat Surat Lamaran Terbit</label>
          <input type="text" name="tmpt_slp_terbit" id="tmpt_slp_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="Jakarta" value="{{ $slp->tmpt_slp_terbit }}">
          <span class="text-xs text-red-600">@error('tmpt_slp_terbit') {{ $message }} @enderror</span>
        </div>
        <div class="w-full md:w-1/2">
          <label for="tgl_slp_terbit">Tanggal Surat Lamaran Terbit</label>
          <input type="date" name="tgl_slp_terbit" id="tgl_slp_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ $slp->tgl_slp_terbit }}">
          <span class="text-xs text-red-600">@error('tgl_slp_terbit') {{ $message }} @enderror</span>
        </div>
      </div>

      <div class="flex gap-2 mx-8 mt-4">
        <div class="w-1/2">
          <button type="submit" class="w-full p-2 bg-buatbutton font-medium rounded hover:bg-gray-600 hover:text-white">Submit</button>
        </div>
        <div class="w-1/2 mt-2">
          <a href="{{ route('dashboard.index') }}" class="w-full p-2 bg-gray-400 font-medium rounded hover:bg-gray-600 hover:text-white">Back</a>
        </div>
      </div>
        
    </form>
  </div>
</div>
@endforeach
@endsection


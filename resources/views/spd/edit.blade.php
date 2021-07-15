@extends('layout')

@section('content')
@php
    $slugSurat = explode('_',$order->nama_order)[0];
    $namaOrder = explode('_',$order->nama_order)[1];
    $spd = $order->spds[0];
@endphp
{{-- {{dd($spd->nama_spd)}} --}}
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
<div class="flex w-full justify-center items-center">
  <div class="flex flex-col p-4 my-5 w-10/12 bg-buatbgkomponen gap-2 rounded-md">
    <p class="text-center font-medium text-3xl">Edit Surat Pengunduran Diri</p>
    <form action="{{ '/'.$slugSurat.'/'.$order->order_id }}" method="post">
      @method('PATCH')
      @csrf
        <div class="mx-8 mt-3 mb-1 opacity-60">
          <label for="nama_order">Nama Surat</label>
          <input type="text" name="nama_order" id="nama_order" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{$namaOrder}}" disabled>
          <span class="text-xs text-red-600">@error('nama_order') {{ $message }} @enderror</span>
        </div>
        <div class="mx-8 mb-1">
          <label for="nama_spd">Nama Lengkap</label>
          <input type="text" name="nama_spd" id="nama_spd" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ $spd->nama_spd }}">
          <span class="text-xs text-red-600">@error('nama_spd') {{ $message }} @enderror</span>
        </div>
        <div class="flex gap-2 mx-8 mb-1">
          <div class="w-1/2">
            <label for="perusahaan_spd">Nama Perusahaan</label>
            <input type="text" name="perusahaan_spd" id="perusahaan_spd" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
            value="{{ $spd->perusahaan_spd }}">
            <span class="text-xs text-red-600">@error('perusahaan_spd') {{ $message }} @enderror</span>
          </div>
          <div class="w-1/2">
            <label for="jabatan_spd">Jabatan</label>
            <input type="text" name="jabatan_spd" id="jabatan_spd" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
            value="{{ $spd->jabatan_spd }}">
            <span class="text-xs text-red-600">@error('jabatan_spd') {{ $message }} @enderror</span>
          </div>
        </div>
        <div class="mx-8 mb-1">
          <label for="tgl_spd">Tanggal Pengunduran Diri</label>
          <input type="date" name="tgl_spd" id="tgl_spd" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ $spd->tgl_spd }}">
          <span class="text-xs text-red-600">@error('tgl_spd') {{ $message }} @enderror</span>
        </div>
        <div class="mx-8 mb-1">
          <label for="penerima_spd">Penerima Surat</label>
          <input type="text" name="penerima_spd" id="penerima_spd" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          value="{{ $spd->penerima_spd }}">
          <span class="text-xs text-red-600">@error('penerima_spd') {{ $message }} @enderror</span>
        </div>
        <div class="flex gap-2 mx-8 mb-2">
          <div class="w-1/2">
            <label for="tmpt_spd_terbit">Dimana Surat Ini Di Terbitkan</label>
            <input type="text" name="tmpt_spd_terbit" id="tmpt_spd_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ $spd->tmpt_spd_terbit }}">
            <span class="text-xs text-red-600">@error('tmpt_spd_terbit') {{ $message }} @enderror</span>
          </div>
          <div class="w-1/2">
            <label for="tgl_spd_terbit">Kapan Surat Ini Di Terbitkan</label>
            <input type="date" name="tgl_spd_terbit" id="tgl_spd_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ $spd->tgl_spd_terbit }}">
            <span class="text-xs text-red-600">@error('tgl_spd_terbit') {{ $message }} @enderror</span>
          </div>
        </div>

        <div class="flex gap-2 mx-8">
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
@endsection
@extends('layout')

@section('content')
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
<div class="flex w-full justify-center items-center">
  <div class="flex flex-col p-4 my-5 w-10/12 bg-buatbgkomponen gap-2 rounded-md">
    <p class="text-center font-medium text-3xl">Buat Surat Izin Tidak Masuk Kerja</p>
    <form action="{{ route('sitmk.store', Auth::user()->user_id) }}" method="post">
      @csrf

        <div class="mx-8 mt-3 mb-1">
          <label for="nama_order">Nama Surat</label>
          <input type="text" name="nama_order" id="nama_order" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Surat Punya Budi" value="{{ old("nama_order") }}">
          <span class="text-xs text-red-600">@error('nama_order') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="nama_sitmk">Nama Lengkap</label>
          <input type="text" name="nama_sitmk" id="nama_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Mawar" value="{{ old("nama_sitmk") }}">
          <span class="text-xs text-red-600">@error('nama_sitmk') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="jabatan_sitmk">Jabatan</label>
          <input type="text" name="jabatan_sitmk" id="jabatan_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Admin Produksi" value="{{ old("jabatan_sitmk") }}">
          <span class="text-xs text-red-600">@error('jabatan_sitmk') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="alamat_sitmk">Alamat</label>
          <input type="text" name="alamat_sitmk" id="alamat_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Jl. Pandu No.1 Rt.001/001 Cikini, Jakarta Pusat, DKI Jakarta." value="{{ old("alamat_sitmk") }}">
          <span class="text-xs text-red-600">@error('alamat_sitmk') {{ $message }} @enderror</span>
        </div>

        <div class="flex flex-col md:flex-row gap-2 mx-8 mb-2">
          <div class="w-full md:w-1/2">
            <label for="mulai_sitmk">Mulai Tidak Masuk</label>
            <input type="date" name="mulai_sitmk" id="mulai_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("mulai_sitmk") }}">
            <span class="text-xs text-red-600">@error('mulai_sitmk') {{ $message }} @enderror</span>
          </div>
          <div class="w-full md:w-1/2">
            <label for="sampai_sitmk">Sampai Tidak Masuk</label>
            <input type="date" name="sampai_sitmk" id="sampai_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("sampai_sitmk") }}">
            <span class="text-xs text-red-600">@error('sampai_sitmk') {{ $message }} @enderror</span>
          </div>
        </div>

        <div class="mx-8 mb-1">
          <label for="alasan_sitmk">Alasan Tidak Masuk Kerja</label>
          <input type="text" name="alasan_sitmk" id="alasan_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Sakit diare" value="{{ old("alasan_sitmk") }}">
          <span class="text-xs text-red-600">@error('alasan_sitmk') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="penerima_sitmk">Penerima Surat Izin Tidak Masuk Kerja</label>
          <input type="text" name="penerima_sitmk" id="penerima_sitmk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="HRD PT.Indo Kaya Energi" value="{{ old("penerima_sitmk") }}">
          <span class="text-xs text-red-600">@error('penerima_sitmk') {{ $message }} @enderror</span>
        </div>
        
        <div class="flex flex-col md:flex-row gap-2 mx-8 mb-2">
          <div class="w-full md:w-1/2">
            <label for="tmpt_sitmk_terbit">Dimana Surat Ini Di Terbitkan</label>
            <input type="text" name="tmpt_sitmk_terbit" id="tmpt_sitmk_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
            placeholder="Jakarta" value="{{ old("tmpt_sitmk_terbit") }}">
            <span class="text-xs text-red-600">@error('tmpt_sitmk_terbit') {{ $message }} @enderror</span>
          </div>
          <div class="w-full md:w-1/2">
            <label for="tgl_sitmk_terbit">Kapan Surat Ini Di Terbitkan</label>
            <input type="date" name="tgl_sitmk_terbit" id="tgl_sitmk_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("tgl_sitmk_terbit") }}">
            <span class="text-xs text-red-600">@error('tgl_sitmk_terbit') {{ $message }} @enderror</span>
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
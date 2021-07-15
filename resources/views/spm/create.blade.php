@extends('layout')

@section('content')
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
<div class="flex w-full justify-center items-center">
  <div class="flex flex-col p-4 my-5 w-10/12 bg-buatbgkomponen gap-2 rounded-md">
    <p class="text-center font-medium text-3xl">Buat Surat Permohonan Maaf</p>
    <form action="{{ route('spm.store', Auth::user()->user_id) }}" method="post">
      @csrf

        <div class="mx-8 mt-3 mb-1">
          <label for="nama_order">Nama Surat</label>
          <input type="text" name="nama_order" id="nama_order" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Surat Punya Budi" value="{{ old("nama_order") }}">
          <span class="text-xs text-red-600">@error('nama_order') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="nama_spm">Nama Lengkap</label>
          <input type="text" name="nama_spm" id="nama_spm" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Mawar" value="{{ old("nama_spm") }}">
          <span class="text-xs text-red-600">@error('nama_spm') {{ $message }} @enderror</span>
        </div>

        <div class="">
          <p class="mx-8">Jenis Kelamin</p>
        </div>
        <div class="mx-8 mb-1 w-full p-2">
          <input type="radio" name="jns_klm_spm" id="jns_klm_penerima_sk_pria" value="pria" checked>
          <label for="jns_klm_penerima_sk_pria">Pria</label>
          <input type="radio" name="jns_klm_spm" id="jns_klm_penerima_sk_wanita" value="wanita">
          <label for="jns_klm_penerima_sk_wanita">Wanita</label>
        </div>

        <div class="mx-8 mb-1">
          <label for="alamat_spm">Alamat</label>
          <input type="text" name="alamat_spm" id="alamat_spm" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Jl. Pandu No.1 Rt.001/001 Cikini, Jakarta Pusat, DKI Jakarta." value="{{ old("alamat_spm") }}">
          <span class="text-xs text-red-600">@error('alamat_spm') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="pekerjaan_spm">Pekerjaan</label>
          <input type="text" name="pekerjaan_spm" id="pekerjaan_spm" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="Programmer PT. Gelora" value="{{ old("pekerjaan_spm") }}">
          <span class="text-xs text-red-600">@error('pekerjaan_spm') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="kesalahan_spm">Kesalahan Yang Dilakukan</label>
          <input type="text" name="kesalahan_spm" id="kesalahan_spm" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="Mencuri ayam" value="{{ old("kesalahan_spm") }}">
          <span class="text-xs text-red-600">@error('kesalahan_spm') {{ $message }} @enderror</span>
        </div>

        <div class="mx-8 mb-1">
          <label for="penerima_spm">Penerima Surat Permohonan Maaf</label>
          <input type="text" name="penerima_spm" id="penerima_spm" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="Bambang" value="{{ old("penerima_spm") }}">
          <span class="text-xs text-red-600">@error('penerima_spm') {{ $message }} @enderror</span>
        </div>
        
        <div class="flex gap-2 mx-8 mb-2">
          <div class="w-1/2">
            <label for="tmpt_spm_terbit">Dimana Surat Ini Di Terbitkan</label>
            <input type="text" name="tmpt_spm_terbit" id="tmpt_spm_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
            placeholder="Jakarta" value="{{ old("tmpt_spm_terbit") }}">
            <span class="text-xs text-red-600">@error('tmpt_spm_terbit') {{ $message }} @enderror</span>
          </div>
          <div class="w-1/2">
            <label for="tgl_spm_terbit">Kapan Surat Ini Di Terbitkan</label>
            <input type="date" name="tgl_spm_terbit" id="tgl_spm_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("tgl_spm_terbit") }}">
            <span class="text-xs text-red-600">@error('tgl_spm_terbit') {{ $message }} @enderror</span>
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
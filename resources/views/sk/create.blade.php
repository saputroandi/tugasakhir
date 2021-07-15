@extends('layout')

@section('content')
{{-- {{dd(Auth::user()->user_id,Auth::user()->payments->last()->payment_id)}} --}}
<div class="flex w-full justify-center items-center">
  <div class="flex flex-col p-4 my-5 w-10/12 bg-buatbgkomponen gap-2 rounded-md">
    <p class="text-center font-medium text-3xl">Buat Surat Kuasa</p>
    <form action="{{ route('sk.store', Auth::user()->user_id) }}" method="post">
      @csrf
      
      <p class="mx-8 mt-3 font-medium text-xl">Pemberi Kuasa</p>

      <div class="mx-8 mb-1">
        <label for="nama_order">Nama Surat</label>
        <input type="text" name="nama_order" id="nama_order" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Surat Punya Bunga" value="{{ old("nama_order") }}">
        <span class="text-xs text-red-600">@error('nama_order') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="nama_sk">Nama Lengkap</label>
        <input type="text" name="nama_sk" id="nama_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Bunga" value="{{ old("nama_sk") }}">
        <span class="text-xs text-red-600">@error('nama_sk') {{ $message }} @enderror</span>
      </div>

      <div class="flex gap-2 mx-8 mb-1">
        <div class="w-1/2">
          <label for="tmpt_lahir_sk">Tempat Lahir</label>
          <input type="text" name="tmpt_lahir_sk" id="tmpt_lahir_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="PT. Buat Surat" value="{{ old("tmpt_lahir_sk") }}">
          <span class="text-xs text-red-600">@error('tmpt_lahir_sk') {{ $message }} @enderror</span>
        </div>
        <div class="w-1/2">
          <label for="tgl_lahir_sk">Tanggal Lahir</label>
          <input type="date" name="tgl_lahir_sk" id="tgl_lahir_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("tgl_lahir_sk") }}">
          <span class="text-xs text-red-600">@error('tgl_lahir_sk') {{ $message }} @enderror</span>
        </div>
      </div>

      <div class="">
        <p class="mx-8">Jenis Kelamin</p>
      </div>
      <div class="mx-8 mb-1 w-full p-2">
        <input type="radio" name="jns_klm_sk" id="jns_klm_sk_pria" value="pria" checked>
        <label for="jns_klm_sk_pria">Pria</label>
        <input type="radio" name="jns_klm_sk" id="jns_klm_sk_wanita" value="wanita">
        <label for="jns_klm_sk_wanita">Wanita</label>
      </div>

      <div class="mx-8 mb-1">
        <label for="no_ktp_sk">No Kartu Tanda Penduduk</label>
        <input type="text" name="no_ktp_sk" id="no_ktp_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="30001658685234001" value="{{ old("no_ktp_sk") }}">
        <span class="text-xs text-red-600">@error('no_ktp_sk') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="alamat_sk">Alamat</label>
        <input type="text" name="alamat_sk" id="alamat_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Jl. Pandu No.1 Rt.001/001 Cikini, Jakarta Pusat, DKI Jakarta." value="{{ old("alamat_sk") }}">
        <span class="text-xs text-red-600">@error('alamat_sk') {{ $message }} @enderror</span>
      </div>

      <p class="mx-8 mt-1 font-medium text-xl">Penerima Kuasa</p>

      <div class="mx-8 mb-1">
        <label for="nama_penerima_sk">Nama Lengkap Penerima Kuasa</label>
        <input type="text" name="nama_penerima_sk" id="nama_penerima_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Bunga" value="{{ old("nama_penerima_sk") }}">
        <span class="text-xs text-red-600">@error('nama_penerima_sk') {{ $message }} @enderror</span>
      </div>

      <div class="flex gap-2 mx-8 mb-1">
        <div class="w-1/2">
          <label for="tmpt_lahir_penerima_sk">Tempat Lahir Penerima Kuasa</label>
          <input type="text" name="tmpt_lahir_penerima_sk" id="tmpt_lahir_penerima_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="PT. Buat Surat" value="{{ old("tmpt_lahir_penerima_sk") }}">
          <span class="text-xs text-red-600">@error('tmpt_lahir_penerima_sk') {{ $message }} @enderror</span>
        </div>
        <div class="w-1/2">
          <label for="tgl_lahir_penerima_sk">Tanggal Lahir Penerima Kuasa</label>
          <input type="date" name="tgl_lahir_penerima_sk" id="tgl_lahir_penerima_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("tgl_lahir_penerima_sk") }}">
          <span class="text-xs text-red-600">@error('tgl_lahir_penerima_sk') {{ $message }} @enderror</span>
        </div>
      </div>

      <div class="">
        <p class="mx-8">Jenis Kelamin Penerima Kuasa</p>
      </div>
      <div class="mx-8 mb-1 w-full p-2">
        <input type="radio" name="jns_klm_penerima_sk" id="jns_klm_penerima_sk_pria" value="pria" checked>
        <label for="jns_klm_penerima_sk_pria">Pria</label>
        <input type="radio" name="jns_klm_penerima_sk" id="jns_klm_penerima_sk_wanita" value="wanita">
        <label for="jns_klm_penerima_sk_wanita">Wanita</label>
      </div>
      
      <div class="mx-8 mb-1">
        <label for="no_ktp_penerima_sk">No Kartu Tanda Penduduk Penerima Kuasa</label>
        <input type="text" name="no_ktp_penerima_sk" id="no_ktp_penerima_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="30001658685234001" value="{{ old("no_ktp_penerima_sk") }}">
        <span class="text-xs text-red-600">@error('no_ktp_penerima_sk') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="alamat_penerima_sk">Alamat Penerima Kuasa</label>
        <input type="text" name="alamat_penerima_sk" id="alamat_penerima_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Jl. Pandu No.1 Rt.001/001 Cikini, Jakarta Pusat, DKI Jakarta." value="{{ old("alamat_penerima_sk") }}">
        <span class="text-xs text-red-600">@error('alamat_penerima_sk') {{ $message }} @enderror</span>
      </div>

      <div class="mx-8 mb-1">
        <label for="keperluan_sk">Keperluan Surat Kuasa</label>
        <textarea name="keperluan_sk" id="keperluan_sk" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " placeholder="Keperluan Surat Kuasa" rows="3" value="{{ old("keperluan_sk") }}"></textarea>
        <span class="text-xs text-red-600">@error('keperluan_sk') {{ $message }} @enderror</span>
      </div>

      <div class="flex gap-2 mx-8">
        <div class="w-1/2">
          <label for="tmpt_sk_terbit">Tempat Surat Kuasa Terbit</label>
          <input type="text" name="tmpt_sk_terbit" id="tmpt_sk_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded "
          placeholder="Jakarta" value="{{ old("tmpt_sk_terbit") }}">
          <span class="text-xs text-red-600">@error('tmpt_sk_terbit') {{ $message }} @enderror</span>
        </div>
        <div class="w-1/2">
          <label for="tgl_sk_terbit">Tanggal Surat Kuasa Terbit</label>
          <input type="date" name="tgl_sk_terbit" id="tgl_sk_terbit" class="w-full p-2 border-2 border-buatborder bg-buatbody rounded " value="{{ old("tgl_sk_terbit") }}">
          <span class="text-xs text-red-600">@error('tgl_sk_terbit') {{ $message }} @enderror</span>
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
@endsection
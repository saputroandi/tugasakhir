@extends('layout-surat')

@section('content-surat')
{{-- {{dd($namaOrder, $tanggalLahirSk, $tanggalLahirPenerimaSK, $tanggalSKTerbit)}} --}}
<div class="flex flex-col w-full my-10 justify-center items-center">

  <div class="my-3">
    <p class="namaOrder">{{ ucfirst($namaOrder) }}</p>
  </div>
  
  <div class="my-3">
    <a href="#" class="p-3 rounded bg-blue-500 button-print">Download</a>
  </div>

  <div class="w-21cm my-5 bg-white layout-surat font-surat">
    <div class="flex flex-col p-2.54cm">

      <div class="text-center mb-10">
        <p class="font-semibold underline">SURAT PERMOHONAN MAAF</p>
      </div>

      <div class="mb-4 text-right">
        <p>{{ucfirst($spm->tmpt_spm_terbit).', '.$tanggalSPMTerbit}}</p>
      </div>

      <div class="">
        <p>Kepada Yth.</p>
      </div>

      <div class="">
        <p>{{ucfirst($spm->penerima_spm)}}</p>
      </div>

      <div class="mb-6">
        <p>Di tempat</p>
      </div>

      <div class="mb-2">
        <p>Dengan Hormat,</p>
      </div>

      <div class="ml-1.27cm mb-2">
        <p>Saya yang bertanda tangan di bawah ini:</p>
      </div>

      <div class="ml-1.27cm mb-0.63cm">
        <table class="w-full">
          <tbody>
            <tr class="w-full">
              <td class="w-1/4">Nama</td>
              <td>:</td>
              <td>{{ucfirst($spm->nama_spm)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Jenis Kelamin</td>
              <td>:</td>
              <td>{{ucfirst($spm->jns_klm_spm)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Alamat</td>
              <td>:</td>
              <td>{{$spm->alamat_spm}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Pekerjaan</td>
              <td>:</td>
              <td>{{$spm->pekerjaan_spm}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="text-justify mb-0.63cm">
        <p class=""><span class="ml-1.27cm"></span>Bersama surat ini, saya bermaksud untuk menyampaikan permohonan maaf kepada {{ucfirst($spm->penerima_spm)}} sehubungan dengan kesalahan yang telah saya lakukan yaitu {{$spm->kesalahan_spm}}.</p>
      </div>

      <div class="text-justify mb-0.63cm">
        <p class=""><span class="ml-1.27cm"></span>Demikian surat permohonan maaf ini saya buat sebagai bentuk penyesalan saya terhadap kelalaian yang telah saya lakukan. Semoga Bapak/Ibu/Saudara berkenan untuk memaafkan saya.</p>
      </div>

      <div class="flex w-full">
        <div class="flex w-1/2"></div>
        <div class="flex flex-col items-center w-1/2">
          <p class="">{{ucfirst($spm->tmpt_spm_terbit).', '.$tanggalSPMTerbit}}</p>
          <p class="mb-16">Hormat Saya</p>
          <p class=" font-semibold underline text-center">({{ucfirst($spm->nama_spm)}})</p>
        </div>
      </div>

    </div> 
</div>
@endsection
@extends('layout-surat')

@section('content-surat')
<div class="flex flex-col w-full my-10 justify-center items-center">
  <div class="my-3">
    <p class="namaOrder">{{ ucfirst($namaOrder) }}</p>
  </div>
  <div class="my-3">
    <a href="#" class="p-3 rounded bg-blue-500 button-print">Download</a>
  </div>

  <div class="w-21cm my-5 bg-white layout-surat font-surat">
    <div class="flex flex-col py-2.54cm px-2.54cm">

      <div class="text-center mb-10">
        <p class="font-semibold underline">SURAT PENGUNDURAN DIRI</p>
      </div>
      
      <div class="mb-4">
        <p class="text-right">{{ucfirst($spd->tmpt_spd_terbit) . ', ' . $tanggalSPDTerbit}}</p>
      </div>
      
      <div class="">
        <p>Kepada Yth.</p>
      </div>

      <div class="">
        <p>{{ucfirst($spd->penerima_spd)}}</p>
      </div>

      <div class="mb-6">
        <p>Di tempat</p>
      </div>

      <div class="mb-2">
        <p>Dengan Hormat,</p>
      </div>

      <div class="mb-3">
        <p class="text-justify"><span class="ml-1.27cm"></span>Melalui surat ini saya {{ucfirst(trans($spd->nama_spd))}} bermaksud mengundurkan diri sebagai {{ucfirst($spd->jabatan_spd)}} di {{ucfirst($spd->perusahaan_spd)}} terhitung sejak {{$tanggalSPD}}.</p>
      </div>

      <div class="mb-3">
        <p class="text-justify"><span class="ml-1.27cm"></span>Saya sangat berterimakasih atas kesempatan yang telah diberikan kepada saya untuk bekerja di {{ucfirst($spd->perusahaan_spd)}}, saya juga meminta maaf kepada seluruh karyawan dan pimpinan apabila terdapat kesalahanyang telah saya lakukan selama bekerja.</p>
      </div>

      <div class="mb-6">
        <p class="text-justify"><span class="ml-1.27cm"></span>Demikian Surat Pengunduran Diri ini saya tulis dengan sebenar-benarnya dan penuh kesadaran. Saya berharap {{ucfirst($spd->perusahaan_spd)}} dapat terus berjaya dan memperoleh yang terbaik.</p>
      </div>

      <div class="grid grid-cols-2 place-items-center">
        <div class=""></div>
        <div class="flex flex-col justify-center">
          <div class="w-full mb-16">
            <p class="text-center">Hormat Saya</p>
          </div>
          <div class="w-full">
            <p class="font-semibold text-sm text-center">( {{ucfirst(trans($spd->nama_spd))}} )</p>
          </div>
        </div>
      </div>

    </div> 
</div>
@endsection
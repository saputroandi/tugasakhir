@extends('layout-surat')

@section('content-surat')
@foreach ($order->slps as $key => $slp)
{{-- {{dd($order)}} --}}
    
<div class="flex flex-col w-full my-10 justify-center items-center">
  
  <div class="my-3">
    <p class="namaOrder">{{ ucfirst(explode('_',$order->nama_order)[1]) }}</p>
  </div>

  <div class="my-3">
    <a href="#" class="p-3 rounded bg-blue-500 button-print">Download</a>
  </div>

  <div class="w-21cm my-5 bg-white layout-surat font-surat">
    <div class="flex flex-col p-2.54cm">

      <div class="mb-4">
        <p class="text-right">{{ucfirst($slp->tmpt_slp_terbit) . ', ' . $tanggalSLPTerbit}}</p>
      </div>

      <div class="">
        <p>Kepada Yth.</p>
      </div>

      <div class="">
        <p>{{ucfirst($slp->penerima_slp)}}</p>
      </div>

      <div class="mb-6">
        <p>Di tempat</p>
      </div>

      <div class="mb-2">
        <p>Dengan Hormat,</p>
      </div>

      <div class="mb-3">
        <p class="text-justify"><span class="ml-1.27cm"></span>Sehubungan dengan informasi yang saya peroleh bahwa di perusahaan Bapak/Ibu sedang membuka lowongan pekerjaan, maka untuk itu saya yang bertanda tangan di bawah ini :</p>
      </div>

      <div class="ml-1.27cm mb-0.63cm">
        <table class="w-full">
          <tbody>
            <tr class="w-full">
              <td class="w-1/4">Nama</td>
              <td>:</td>
              <td>{{ucfirst($slp->nama_slp)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Tempat/ Tgl Lahir</td>
              <td>:</td>
              <td>{{ucfirst($slp->tmpt_lahir_slp).', '.$tanggalLahirSLP}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Jenis Kelamin</td>
              <td>:</td>
              <td>{{ucfirst($slp->jns_klm_slp)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Pendidikan Terakhir</td>
              <td>:</td>
              <td>{{ucfirst($slp->pendidikan_slp)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">No Handphone</td>
              <td>:</td>
              <td>{{$slp->no_hp_slp}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Email</td>
              <td>:</td>
              <td>{{$slp->email_slp}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mb-3">
        <p class="text-justify"><span class="ml-1.27cm"></span>Dengan ini saya mengajukan permohonan kepada Bapak/Ibu, kiranya dapat menerima saya sebagai karyawan pada posisi manager di perusahaan Bapak/Ibu</p>
      </div>

      <div class="mb-3">
        <p class="text-justify"><span class="ml-1.27cm"></span>Sebagai bahan pertimbangan Bapak/Ibu bersama ini saya lampirkan :</p>
      </div>

      <div class="ml-1.27cm mb-3">
        @foreach ($slp->lampirans as $key => $lampiran)
        <div class="flex gap-1 mb-1">
          <div class="">
            <p>{{ $loop->iteration.'.' }}</p>
          </div>
          <div class="">
            <p>{{ $lampiran->nama_lampiran }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="mb-3">
        <p class="text-justify"><span class="ml-1.27cm"></span>Demikian Surat Lamaran Kerja ini saya buat dengan sebenar-benarnya, besar harapan saya untuk dapat diterima di perusahaan Bapak/Ibu.</p>
      </div>

      <div class="grid grid-cols-2 place-items-center">
        <div class=""></div>
        <div class="flex flex-col justify-center">
          <div class="w-full mb-16">
            <p class="text-center">Hormat Saya</p>
          </div>
          <div class="w-full">
            <p class="font-semibold text-sm text-center">( {{ucfirst(trans($slp->nama_slp))}} )</p>
          </div>
        </div>
      </div>

    </div> 
</div>

@endforeach
@endsection
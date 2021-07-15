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
        <p class="font-semibold underline">SURAT KUASA</p>
      </div>

      <div class=" mb-0.63cm">
        <p>Saya yang bertanda tangan di bawah ini :</p>
      </div>

      <div class="ml-1.27cm mb-0.63cm">
        <table class="w-full">
          <tbody>
            <tr class="w-full">
              <td class="w-1/4">Nama</td>
              <td>:</td>
              <td>{{ucfirst($sk->nama_sk)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Tempat/ Tgl Lahir</td>
              <td>:</td>
              <td>{{ucfirst($sk->tmpt_lahir_sk).', '.$tanggalLahirSK}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Jenis Kelamin</td>
              <td>:</td>
              <td>{{ucfirst($sk->jns_klm_sk)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">No KTP</td>
              <td>:</td>
              <td>{{$sk->no_ktp_sk}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Alamat</td>
              <td>:</td>
              <td>{{$sk->alamat_sk}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="text-justify mb-0.63cm">
        <p class="text-justify"><span class="ml-1.27cm"></span>Selanjutnya disebut sebagai <span class="font-semibold">PIHAK PERTAMA</span>, bersamaan dengan surat ini memberikan <span class="font-semibold">KUASA</span> kepada :</p>
      </div>

      <div class="ml-1.27cm mb-0.63cm">
        <table class="w-full">
          <tbody>
            <tr class="w-full">
              <td class="w-1/4">Nama</td>
              <td>:</td>
              <td>{{ucfirst($sk->nama_penerima_sk)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Tempat/ Tgl Lahir</td>
              <td>:</td>
              <td>{{ucfirst($sk->tmpt_lahir_penerima_sk).', '.$tanggalLahirPenerimaSK}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Jenis Kelamin</td>
              <td>:</td>
              <td>{{ucfirst($sk->jns_klm_penerima_sk)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">No KTP</td>
              <td>:</td>
              <td>{{$sk->no_ktp_penerima_sk}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Alamat</td>
              <td>:</td>
              <td>{{$sk->alamat_penerima_sk}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="text-justify mb-0.63cm">
        <p><span class="ml-1.27cm"></span>Selanjutnya disebut sebagai <span class="font-semibold">PIHAK KEDUA</span>, untuk keperluan buat {{$sk->keperluan_sk}}</p>
      </div>

      <div class="text-justify mb-0.63cm">
        <p class=""><span class="ml-1.27cm"></span>Demikian Surat Kuasa ini dibuat dengan sebenar-benarnya untuk dipergunakan seperlunya. Atas perhatian dan kerjasama Bapak/Ibu/Saudara kami ucapkan terima kasih.</p>
      </div>

      <div class="flex w-full justify-between">
        <div class="flex flex-col flex-grow items-center mt-6">
          <p class="mb-20">Pihak Kedua</p>
          <p class=" font-semibold underline">({{ucfirst($sk->nama_penerima_sk)}})</p>
        </div>
        <div class="flex flex-col flex-grow items-center">
          <p>{{$sk->tmpt_sk_terbit.', '.$tanggalSKTerbit}}</p>
          <p class="mb-5">Pihak Pertama</p>
          <p class="mb-5 p-1 border-2 border-black">materai</p>
          <p class=" font-semibold underline">({{ucfirst($sk->nama_sk)}})</p>
        </div>
      </div>

    </div> 
</div>
@endsection
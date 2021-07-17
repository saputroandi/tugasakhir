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

      <div class="mb-4">
        <p class="text-right">{{ucfirst($sitmk->tmpt_sitmk_terbit) . ', ' . $tanggalSITMKTerbit}}</p>
      </div>

      <div class="mb-6">
        <p>Perihal <span class="ml-6"></span>: Permohonan Izin Tidak Masuk Kerja</p>
      </div>

      <div class="">
        <p>Kepada Yth.</p>
      </div>

      <div class="">
        <p>{{ucfirst($sitmk->penerima_sitmk)}}</p>
      </div>

      <div class="mb-10">
        <p>Di tempat</p>
      </div>

      <div class="mb-2">
        <p>Dengan Hormat,</p>
      </div>

      <div class="mb-2">
        <p><span class="ml-1.27cm"></span>Saya yang bertanda tangan di bawah ini:</p>
      </div>

      <div class="ml-1.27cm mb-2">
        <table class="w-full">
          <tbody>
            <tr class="w-full">
              <td class="w-1/4">Nama</td>
              <td>:</td>
              <td>{{ucfirst($sitmk->nama_sitmk)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Jabatan</td>
              <td>:</td>
              <td>{{ucfirst($sitmk->jabatan_sitmk)}}</td>
            </tr>
            <tr class="w-full">
              <td class="w-1/4">Alamat</td>
              <td>:</td>
              <td>{{ucfirst($sitmk->alamat_sitmk)}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mb-2">
        <p class="text-justify"><span class="ml-1.27cm"></span>Dengan ini saya ingin memberitahukan bahwa pada tanggal {{$tanggalMulaiSITMK}} s.d. {{$tanggalAkhirSITMK}} saya tidak bisa masuk untuk bekerja seperti biasanya dikarenakan {{$sitmk->alasan_sitmk}}. Sehubungan dengan hal tersebut, saya bermaksud untuk memohon izin untuk tidak masuk kerja pada tanggal tersebut</p>
      </div>

      <div class="mb-0.63cm">
        <p class="text-justify"><span class="ml-1.27cm"></span>Demikian surat izin saya sampaikan dengan sebenar-benarnya. Atas perhatiannya saya ucapkan terima kasih.</p>
      </div>

      <div class="flex w-full">
        <div class="flex w-1/2"></div>
        <div class="flex flex-col items-center w-1/2">
          <p class="">{{ucfirst($sitmk->tmpt_sitmk_terbit).', '.$tanggalSITMKTerbit}}</p>
          <p class="mb-16">Hormat Saya</p>
          <p class=" font-semibold underline">({{ucfirst($sitmk->nama_sitmk)}})</p>
        </div>
      </div>

    </div> 
</div>
@endsection
@extends('layout-surat')

@section('content-surat')
{{-- {{dd($document)}} --}}
{{-- <div class="container-center">
  <p class="header">SURAT PENGUNDURAN DIRI</p><br>
</div>
<div class="container-end">
  <p>{{$document->tmpt_spd_terbit . ', ' . date('d M Y', strtotime($document->tgl_spd_terbit))}}</p><br>
</div>
<div class="">
  <p>Kepada Yth.</p>
</div>
<div class="">
  <p>{{$document->penerima_spd}}</p>
</div>
<div class="">
  <p>Di Tempat</p>
  <br>
  <br>
</div>
<div class="">
  <p>Dengan Hormat,</p>
  <br>
</div>
<div class="">
  <p class="paragraph"><span></span>Melalui surat ini saya {{ucfirst(trans($document->nama_spd))}} bermaksud mengundurkan diri sebagai {{$document->jabatan_spd}} di {{$document->perusahaan_spd}} terhitung sejak {{date('d M Y', strtotime($document->tgl_spd))}}.</p><br>
</div>
<div class="">
  <p class="paragraph"><span></span>Saya sangat berterimakasih atas kesempatan yang telah diberikan kepada saya untuk bekerja di {{$document->perusahaan_spd}}, saya juga meminta maaf kepada seluruh karyawan dan pimpinan apabila terdapat kesalahanyang telah saya lakukan selama bekerja.</p><br>
</div>
<div class="">
  <p class="paragraph"><span></span>Demikian Surat Pengunduran Diri ini saya tulis dengan sebenar-benarnya dan penuh kesadaran. Sayaberharap {{$document->perusahaan_spd}} dapat terus berjaya dan memperoleh yang terbaik.</p><br><br>
</div>
<div class="">
  <p class="hormat">Hormat saya</p><br><br>
</div>
<div class="">
  <p class="ttd">( {{ucfirst(trans($document->nama_spd))}} )</p>
</div> --}}
<div class="layout-surat">

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  <div class="">
    <p style="text-align: justify; background-color: red"><span style="margin-left: 30px;"></span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos minus nemo similique voluptatem voluptas repellendus officia in ratione sit consequatur vero impedit eligendi nisi maxime inventore quos, tenetur dolor assumenda.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur aspernatur maiores alias, ipsam facilis pariatur exercitationem magni assumenda? Deleniti eligendi deserunt, maxime repudiandae unde fugiat veniam error nemo ea. Animi.</p>
  </div>
</div>
<a href="#" class="btn btn-primary button-gw">Alert</a>
@endsection
@extends('layout')

@section('content')
{{-- {{dd(explode('_',$orders[0]->nama_order)[1])}} --}}
{{-- {{ dd(Auth::user()->payments->first()->payment_status) }} --}}
  <div class="flex items-center justify-center flex-col flex-grow gap-10 max-h-full my-6">
    @if (Session::get("success"))
    <div class="flex justify-center w-11/12 py-3 bg-green-500 opacity-75 rounded">
      <span class="text-xs text-center">{{ Session::get("success") }}</span>
    </div>
    @endif
    @if (Session::get("fail"))
    <div class="flex justify-center w-11/12 py-3 bg-red-500 opacity-75 rounded">
      <span class="text-xs text-center">{{ Session::get("fail") }}</span>
    </div>
    @endif
    <div class="flex w-full justify-center items-center">
      <div class="flex flex-col p-4 w-10/12 gap-2 items-center rounded-md shadow-lg bg-buatbgkomponen">
        <div class="">
          <p class="text-3xl font-medium">List Surat Anda</p>
        </div>
        <div class="flex justify-center w-full rounded bg-blue-500 hover:bg-blue-600">
          <a href="{{ route('choose.index') }}" class="w-full py-2">
            <p class="text-center">Buat Surat Baru</p>
          </a>
        </div>
        <div class="flex flex-col w-full p-4 bg-buatbody rounded gap-3">
          {{-- header --}}
          <div class="flex w-full py-2 bg-gray-400 rounded">
            <div class="flex justify-center w-1/3">
              <p class="font-semibold">No</p>
            </div>
            <div class="flex justify-center w-1/3">
              <p class="font-semibold">Nama Surat</p>
            </div>
            <div class="flex justify-center w-1/3">
              <p class="font-semibold">Action</p>
            </div>
          </div>
          {{-- end of header --}}
          @foreach ($orders as $key => $order)
          @php
              $namaDomainSurat = explode('_',$order->nama_order)[0];
              $namaOrder = explode('_',$order->nama_order)[1];
          @endphp
          {{-- data --}}
          <div class="flex w-full hover:bg-buatbgkomponen rounded">
            <div class="flex justify-center items-center p-2 w-1/3">
              <p>{{ $loop->iteration }}</p>
            </div>
            <div class="flex flex-col justify-center p-2 w-1/3">
              <p class="font-semibold text-xl">{{ $namaOrder }}</p>
              <p class="font-light text-sm">{{ $namaSurat[$key] }}</p>
            </div>
            <div class="flex justify-center items-center p-2 w-1/3 gap-3">
              <a href="{{ '/'.$namaDomainSurat.'/'.$order->order_id.'/edit' }}" class="p-3 rounded bg-green-500">Edit</a>
              <a href="{{ route('print.download',['slug' => $namaDomainSurat, 'order' => $order->order_id]) }}" class="p-3 rounded bg-blue-500">Download</a>
              <form action="{{ '/'.$namaDomainSurat.'/'.$order->order_id }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="p-3 rounded bg-red-500">Delete</button>
              </form>
            </div>
          </div>
          {{-- end of data --}}
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
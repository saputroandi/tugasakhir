@extends('layout')

@section('content')
{{-- {{ dd(Auth::user()->payments->first()->payment_status) }} --}}
  <div class="flex items-center justify-center flex-col flex-grow gap-10 max-h-full my-6">
    @if (Session::get("success"))
    <div class="flex justify-center w-11/12 py-3 bg-green-500 opacity-75">
      <span class="text-xs text-center">{{ Session::get("success") }}</span>
    </div>
    @endif
    @if (Session::get("fail"))
    <div class="flex justify-center w-11/12 py-3 bg-red-500 opacity-75">
      <span class="text-xs text-center">{{ Session::get("fail") }}</span>
    </div>
    @endif
    <div class="flex w-full justify-center items-center">
      <div class="flex flex-col p-4 w-10/12 gap-2 items-center rounded-md shadow-lg bg-buatbgkomponen">
        <div class="">
          <p class="text-3xl font-medium">List Semua Surat User</p>
        </div>
        <div class="flex flex-col w-full p-4 bg-buatbody rounded gap-3">
          {{-- header --}}
          <div class="flex w-full py-2 bg-gray-400 rounded">
            <div class="hidden md:flex justify-center w-1/3">
              <p class="font-semibold">No</p>
            </div>
            <div class="flex justify-center w-1/2 md:w-1/3">
              <p class="font-semibold">Nama Surat</p>
            </div>
            <div class="flex justify-center w-1/2 md:w-1/3">
              <p class="font-semibold">Action</p>
            </div>
          </div>
          {{-- end of header --}}
          @foreach ($orders as $key => $order)
          @php
              $slugSurat = explode('_',$order->nama_order)[0];
              $namaOrder = explode('_',$order->nama_order)[1];
          @endphp
          {{-- data --}}
          <div class="flex w-full hover:bg-buatbgkomponen rounded">
            <div class="hidden md:flex justify-center items-center p-2 w-1/3">
              <p>{{ $loop->iteration }}</p>
            </div>
            <div class="flex flex-col justify-center p-2 w-1/2 md:w-1/3">
              <p class="font-semibold text-xl text-center md:text-justify">{{$namaOrder}}</p>
              <p class="font-light text-sm text-center md:text-justify">{{$namaSurat[$key]}}</p>
            </div>
            <div class="flex justify-center items-center p-2 w-1/2 md:w-1/3 gap-3">
              <form action="{{ route('admin.deleteOrder', ['order' => $order->order_id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="hidden md:block p-3 rounded bg-red-500" onclick="return confirm('Anda yakin ingin menghapus surat ini ?')">Delete</button>
                <button type="submit" class="block md:hidden p-3 rounded bg-red-500" onclick="return confirm('Anda yakin ingin menghapus surat ini ?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                </button>
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
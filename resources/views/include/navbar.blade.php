{{-- navbar --}}
<div class="sticky top-0 max-w-full grid grid-cols-6 p-5 gap-y-3 place-items-center shadow-lg bg-buatbgkomponen">
  <div class="grid col-start-1 col-end-4 lg:col-end-3">
    <a href="{{ route("landing") }}" class="p-2 font-semibold text-xl lg:text-3xl">Buat-Surat.online</a>
  </div>
  @guest
  <div class="hidden lg:grid grid-flow-col gap-3 lg:col-start-5 lg:col-end-7">
    <a href="{{ route("auth.login") }}" class="p-2 rounded font-medium bg-buatbutton hover:bg-gray-600 hover:text-white">Masuk</a>
    <a href="{{ route("auth.register") }}" class="p-2 rounded font-medium bg-buatbutton hover:bg-gray-600 hover:text-white">Daftar</a>
  </div>
  @endguest
  @if(Auth::user())
  <div class="hidden lg:grid grid-flow-col gap-3 lg:col-start-5 lg:col-end-7">
    @can('is_user')
      @if (count(Auth::user()->payments) > 0)    
        @if (Auth::user()->payments->first()->payment_status == 1)
        <a href="{{ route('payment.confirmation') }}" class="p-2 rounded font-medium bg-buatbutton hover:bg-gray-600 hover:text-white">Konfirmasi Pembayaran</a>
        @endif
      @else
      <a href="{{ route("payment.create") }}" class="p-2 rounded font-medium bg-buatbutton hover:bg-gray-600 hover:text-white">Daftar Member</a>
      @endif
    @endcan
    <form action="{{ route("auth.logout") }}" method="post">
      @csrf
    <button type="submit" class="p-2 rounded font-medium bg-buatbutton hover:bg-gray-600 hover:text-white">Logout</button>
    </form>
  </div>
  @endif

  {{-- menu mobile --}}
  <div class="menu-mobile grid col-end-7 lg:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </div>
  {{-- end of menu mobile --}}

  {{-- dropdown --}}
  <div class="dropdown-menu grid col-start-1 col-end-7 gap-y-1 border-t-2 border-buatborder">
    @guest
    <a href="{{ route("auth.login") }}" class="p-2 w-96 mt-1 hover:bg-gray-600 hover:text-white text-center rounded font-medium">Masuk</a>
    <a href="{{ route("auth.register") }}" class="p-2 w-96 hover:bg-gray-600 hover:text-white text-center rounded font-medium">Daftar</a>   
    @endguest
    @auth
    @can('is_user')
      @if (count(Auth::user()->payments) > 0)
        @if (Auth::user()->payments->first()->payment_status == 1)
        <a href="{{ route('payment.confirmation') }}" class="p-2 w-96 hover:bg-gray-600 hover:text-white text-center rounded font-medium">Konfirmasi Pembayaran</a>
        @endif
      @else
      <a href="{{ route("payment.create") }}" class="p-2 w-96 hover:bg-gray-600 hover:text-white text-center rounded font-medium">Daftar Member</a>
      @endif
    @endcan
    <form action="{{ route("auth.logout") }}" method="post">
      @csrf
    <button type="submit" class="p-2 w-96 hover:bg-gray-600 hover:text-white text-center rounded font-medium">Logout</button>
    </form>
    @endauth
  </div>
  {{--end of dropdown --}}

</div>
{{-- end of navbar --}}



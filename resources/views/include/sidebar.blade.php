{{-- sidebar --}}

  <aside class="w-36 max-h-full bg-buatbutton hidden md:block">
    <ul class="h-screen mt-8">
      <li class="flex justify-center"><a href="{{ route('admin.index') }}"><img src="{{ url('/icon/hand.png') }}" class="w-16 h-16 p-2 rounded-md hover:shadow-lg"></a></li>
      <li class="flex justify-center"><a href="{{ route('admin.users') }}"><img src="{{ url('/icon/community.png') }}" class="w-16 h-16 p-2 rounded-md hover:shadow-lg"></a></li>
      <li class="flex justify-center"><a href="{{ route('admin.all_document') }}"><img src="{{ url('/icon/document.png') }}" class="w-16 h-16 p-2 rounded-md hover:shadow-lg"></a></li>
    </ul>
  </aside>

{{-- end sidebar --}}
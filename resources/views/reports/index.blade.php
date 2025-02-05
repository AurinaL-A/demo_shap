<x-app-layout>

  <div class="py-12">
    <div class=" max-w-7xl mx-auto px-6 lg:px-8">
    @if(count($works)>1)
      <a class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('reports.create') }}">
        {{ __('СОЗДАТЬ ЗАЯВКУ') }}
      </a>
      @else
      <p>Вы уже отправили работу. Желаем удачи!</p>
      @endif
      @if((auth()->user()->isAdmin()===true))
      <a class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('admin.index') }}">
        {{ __('Перейти в панель администратора') }}
      </a>
      @endif
      <div class='cards flex flex-wrap gap-4'>
        @foreach($works as $work)
        <div class='div-col border border-gray-500  rounded-lg p-6 mt-4 w-80'>
          <p class="text-sm text-gray-500">{{\Carbon\Carbon::parse($work->created_at)->translatedFormat('j F Y')}}</p>
          <span class='text-xl font-semibold	'>{{$work->title}}</span>
          <p class='text-blue-500'>{{$work->description}}</p>
          @isset($work->path_img)
          <img src="/images/{{$work->path_img}}" alt="" class='rounded-lg mt-2'>
          @endisset
          <p id="statusColor" class='statusColor font-medium text-s bg-gray-300 pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>{{$work->score}}</p>
        </div>
        @endforeach
      </div>

    </div>
    @if(count($works)===0)
    
    @endif
  </div>
  </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold py-5">{{ __('Новая заявка на участие')}}</h2>
    </x-slot>
    
    <form class="mx-auto max-w-2xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST" action="{{route('reports.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-5">
            <div>
                <x-input-label for="title" :value="__('Название')"/>
                <x-text-input id="title" class="block mt-1" type="text" name="title" required/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="py-2">
                        <x-input-label for="categorie" :value="__('Вид категории')" />
                        <select id="categorie" class="w-1/2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " name="categorie" required>
                            @foreach($categories as $categorie)
                            <option value='{{$categorie->id}}'>{{$categorie->title}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('categorie')" class="mt-2" />
                    </div>

            <div>
                <x-input-label for="path_img" :value="__('Время')"/>
                <input type='file' id="path_img" class="block mt-1" name="path_img" required/>
                <x-input-error :messages="$errors->get('path_img')" class="mt-2" />
            </div>
            <div>
                <x-primary-button class="ms-3">
                    {{__('Создать')}}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
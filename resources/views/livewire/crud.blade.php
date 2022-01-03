<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Komik') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create" class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Create komik</button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            @if($isModalOpenShow)
            @include('livewire.show')
            @endif
            <div class="grid grid-cols-3 gap-10">
                    @foreach($komiks as $komik) 
                    <div class="w-full rounded overflow-hidden shadow-lg relative flex flex-col">
                        <a wire:click="show({{ $komik->id }})" class=" hover:bg-gray-100">
                            <img class="object-cover h-100 w-full hover:opacity-90" src="{{ url('komik/'.$komik->image)}}" alt="Sunset in the mountains">
                            <div class="px-6 py-4 h-full">
                                <div class="font-bold text-xl mb-1">
                                    {{$komik->judul}}
                                </div>
                                <p class="text-gray-700 text-base">
                                    Penulis: {{$komik->penulis}}
                                </p>
                                <p class=" text-red-500 italic text-base font-bold">
                                    Rp.{{$komik->harga}}
                                </p>
                            </div>
                        </a>
                        <div class="grid grid-cols-2">
                            <x-button wire:click="edit({{ $komik->id }})" class="col-span-1 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Edit') }}
                            </x-button>
                            <x-button wire:click="delete({{ $komik->id }})" class=" text-center col-span-1 w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >
                                {{ __('Delete') }}
                            </x-button>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
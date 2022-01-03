<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('novel.create') }}" >
                        <x-button class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add Novel') }}
                        </x-button>
                    </a>
                    <a href="/pdf">
                        <x-button class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Export PDF
                        </x-button>
                    </a>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="grid grid-cols-3 gap-10">
                    @foreach($novels as $novel)
                    <div class="w-full rounded overflow-hidden shadow-lg relative flex flex-col">
                        <a href="{{ route('novel.show', $novel->id) }}" class=" hover:bg-gray-100">
                            <img class="object-cover h-100 w-full hover:opacity-90" src="{{ asset('images/'.$novel->image) }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4 h-full">
                                <div class="font-bold text-xl mb-1">
                                    {{$novel->judul}}
                                </div>
                                <p class="text-gray-700 text-base">
                                    Penulis: {{$novel->penulis}}
                                </p>
                                <p class=" text-red-500 italic text-base font-bold">
                                    Rp.{{$novel->harga}}
                                </p>
                            </div>
                        </a>
                        <div class="grid grid-cols-2">
                            <a href="{{ route('novel.edit', $novel->id) }}">
                                <x-button class="col-span-1 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Edit') }}
                                </x-button>
                            </a>
                            <form class="inline-block" method="POST" action="{{ url('novel', $novel->id ) }}">
                                @csrf
                                @method('DELETE')
                                <x-button class=" text-center col-span-1 w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    {{ __('Delete') }}
                                </x-button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novel') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="container mx-auto">

                            <div class="text-right">
                                <a href="{{ route('novel.index') }}">
                                    <x-button class="mb-4">
                                        {{ __('Back') }}
                                    </x-button>
                                </a>
                            </div>
                                
                                <div class="grid lg:grid-cols-2 gap-4">
                                    <div class="col-span-2 flex justify-center">
                                        <img class=" h-96" src="{{ asset('images/'.$novel->image) }}" alt="">
                                    </div>
                                    <!-- Emp ID -->
                                    <div>
                                        <x-label for="isbn" :value="__('ISBN')" />

                                        <x-input id="isbn" class="block mt-1 w-full" type="text" name="isbn" value="{{ $novel->isbn }}" readonly />
                                    </div>

                                    <!-- Name -->
                                    <div>
                                        <x-label for="judul" :value="__('Judul')" />
                                        <x-input id="judul" class="block mt-1 w-full" type="text" name="judul" value="{{ $novel->judul }}" readonly />
                                    </div>

                                    <!-- penulis -->
                                    <div class="mt-4">
                                        <x-label for="penulis" :value="__('Penulis')" />
                                        <x-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" value="{{ $novel->penulis }}" readonly />
                                    </div>

                                    <!-- Email-->
                                    <div class="mt-4">
                                        <x-label for="penerbit" :value="__('Penerbit')" />
                                        <x-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" value="{{ $novel->penerbit }}" readonly />
                                    </div>

                                    <!-- phone-->
                                    <div class="mt-4">
                                        <x-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                                        <x-input id="tahun_terbit" class="block mt-1 w-full" type="number" name="tahun_terbit" value="{{ $novel->tahun_terbit }}" readonly />
                                    </div>

                                    <!-- Harga-->
                                    <div class="mt-4">
                                        <x-label for="harga" :value="__('Harga')" />
                                        <x-input id="harga" class="block mt-1 w-full" type="number" name="harga" value="{{ $novel->harga }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
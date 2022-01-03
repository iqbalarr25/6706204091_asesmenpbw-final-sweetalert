<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('novel') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container mx-auto">

                        @if ($errors->any())

                            <div class="mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                              </div>
                        @endif

                            <div class="text-right">
                                <a href="{{ route('novel.index') }}">
                                    <x-button class="mb-4">
                                        {{ __('Back') }}
                                    </x-button>
                                </a>    
                            </div>
                            <form action="{{ route('novel.update',$novel->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid lg:grid-cols-2 gap-4">
                                    <!-- Emp ID -->
                                    <div>
                                        <x-label for="isbn" :value="__('ISBN')" />

                                        <x-input id="isbn" class="block mt-1 w-full" type="text" name="isbn" value="{{ $novel->isbn }}" required />
                                    </div>

                                    <!-- Name -->
                                    <div>
                                        <x-label for="judul" :value="__('Judul')" />
                                        <x-input id="judul" class="block mt-1 w-full" type="text" name="judul" value="{{ $novel->judul }}" required />
                                    </div>

                                    <!-- penulis -->
                                    <div class="mt-4">
                                        <x-label for="penulis" :value="__('Penulis')" />
                                        <x-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" value="{{ $novel->penulis }}" required />
                                    </div>

                                    <!-- Email-->
                                    <div class="mt-4">
                                        <x-label for="penerbit" :value="__('Penerbit')" />
                                        <x-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" value="{{ $novel->penerbit }}" required />
                                    </div>

                                    <!-- phone-->
                                    <div class="mt-4">
                                        <x-label for="tahun_terbit" :value="__('Tahun terbit')" />
                                        <x-input id="tahun_terbit" class="block mt-1 w-full" type="text" name="tahun_terbit" value="{{ $novel->tahun_terbit }}" required />
                                    </div>

                                    <div class="mt-4">
                                        <x-label for="harga" :value="__('Harga')" />
                                        <x-input id="harga" class="block mt-1 w-full" type="text" name="harga" value="{{ $novel->harga }}" required />
                                    </div>

                                    <div class="mt-4">
                                        <x-label for="image" :value="__('Image')" />
                                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ $novel->image }}" required />
                                    </div>

                                </div>

                                <div class="text-right">
                                    <x-button class="mt-4 ">
                                     {{ __('Update') }}
                                 </x-button>
                                 </div>
                            </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">  
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form enctype="multipart/form-data">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <div class="flex flex-row-reverse">
                            <button wire:click="closeModal()">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11 w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="grey" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="isbn"
                                class="block text-gray-700 text-sm font-bold mb-2">ISBN</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="isbn" placeholder="Enter ISBN" wire:model="isbn">
                            @error('isbn') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="judul"
                                class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="judul" wire:model="judul"
                                placeholder="Enter judul"></textarea>
                            @error('judul') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="penulis"
                                class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="penulis" wire:model="penulis"
                                placeholder="Enter penulis"></textarea>
                            @error('penulis') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="penerbit"
                                class="block text-gray-700 text-sm font-bold mb-2">Penerbit</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="penerbit" wire:model="penerbit"
                                placeholder="Enter penerbit"></textarea>
                            @error('penerbit') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="tahun_terbit"
                                class="block text-gray-700 text-sm font-bold mb-2">Tahun terbit</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="tahun_terbit" wire:model="tahun_terbit"
                                placeholder="Enter tahun terbit"></textarea>
                            @error('tahun_terbit') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="harga"
                                class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="harga" wire:model="harga"
                                placeholder="Enter harga"></textarea>
                            @error('harga') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="image"
                                class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                <div class="mt-4">
                                        <x-input wire:model="image" id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
                                </div>
                                <div class="mb-4">
                                    @switch($image)
                                        @case($temp_image)
                                            Photo Preview:
                                            <img src="{{  url('komik/'.$image) }}" alt="image not found">
                                            @break
                                        @default
                                            Photo Preview:
                                            <img src="{{  $image->temporaryUrl() }}" alt="image not found">
                                    @endswitch
                                </div>
                            @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Store
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
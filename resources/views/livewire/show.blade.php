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

                <div class="grid grid-cols-2 gap-5 flex">
                    <div class="col-span-1">
                            <div class="mb-4">
                                <label for="isbn"
                                    class="block text-gray-700 text-sm font-bold mb-2">ISBN</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="isbn" placeholder="Enter isbn" wire:model="isbn" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="judul"
                                    class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="judul" wire:model="judul" readonly
                                    placeholder="judul"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="penulis"
                                    class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="penulis" wire:model="penulis" readonly
                                    placeholder="penulis"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="penerbit"
                                    class="block text-gray-700 text-sm font-bold mb-2">Penerbit</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="penerbit" wire:model="penerbit" readonly
                                    placeholder="penerbit"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="tahun_terbit"
                                    class="block text-gray-700 text-sm font-bold mb-2">Tahun terbit</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="tahun_terbit" wire:model="tahun_terbit" readonly
                                    placeholder="tahun_terbit"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="harga"
                                    class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="harga" wire:model="harga" readonly
                                    placeholder="harga"></textarea>
                            </div>         
                        </div>
                        <div class="col-span-1">
                            @if ($image)
                                Photo Preview:
                                <img src="{{  url('komik/'.$image) }}" alt="snap">
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">  
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalShow()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
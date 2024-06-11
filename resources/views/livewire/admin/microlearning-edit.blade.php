<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Microlearning') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="w-full p-6 text-gray-900" x-data="{ modelOpen: false }">
                <form wire:submit="save">
                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Nama Microlearning:')" />
                        <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Hex Color -->
                    <div class="mb-4">
                        <x-input-label for="hex" :value="__('Warna HEX:')" />
                        <x-text-input wire:model="hex" id="hex" class="block w-full mt-1" placeholder="#" type="text" name="hex" required autofocus />
                        <x-input-error :messages="$errors->get('hex')" class="mt-2" />
                    </div>

                    <div class="flex justify-between gap-x-2">
                        <x-primary-button type="submit">
                            {{ __('Simpan') }}
                        </x-primary-button>

                        <x-danger-button type="button" @click="modelOpen =!modelOpen">
                            {{ __('Hapus') }}
                        </x-danger-button>
                    </div>
                </form>

                {{-- DELETE MODAL --}}
                <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="modelOpen = true" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-700 bg-opacity-60" aria-hidden="true"
                        ></div>

                        <div x-cloak x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-md p-6 my-10 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl xl:max-w-xl"
                        >
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-bold text-gray-800 ">Menghapus data!</h1>
                            </div>

                            <p class="mt-2 text-gray-800 text-md ">
                                Apakah anda yakin akan menghapus data? jika anda melanjutkan data akan terhapus beserta data lain yang terhubung, yakin melanjutkan?
                            </p>

                            <div class="flex justify-end mt-6">
                                <button for="show" @click="modelOpen = false" type="button" class="px-4 py-2 mr-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-md shadow-md hover:bg-blue-600">
                                    Tidak
                                </button>
                                <button for="show" @click="modelOpen = false" wire:click='destroy()' type="button" class="px-4 py-2 mr-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md shadow-md hover:bg-red-600">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

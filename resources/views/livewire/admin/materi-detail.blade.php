<div class="py-12">
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.pmbj.detail', ['pbid' => $materi->pembelajaran_id]) }}" class="pr-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Detail Materi') }}
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div x-data="{ modelOpen: false }" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div x-data="materiData('{{$ytid}}')" class="grid w-full grid-cols-2 gap-4 p-6 text-gray-900">
                <div>
                    <p class="mb-2 text-xl font-semibold tracking-tight">Pembelajaran {{$materi->pembelajaran->judul}}</p>

                    <form wire:submit='save'>
                        <p class="mb-1">
                            <span class="pr-1 text-sm font-medium text-gray-700">Slide:</span>
                            <span class="text-lg font-semibold">{{ $materi->nomor }}</span>
                        </p>

                        <!-- Judul -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Nama Materi')" />
                            <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- intro -->
                        <div class="mb-4">
                            <x-input-label for="intro" :value="__('Intro')" />
                            <textarea
                                wire:model="intro"
                                id="intro"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                name="intro"
                                required
                                rows="8"></textarea>
                            <x-input-error :messages="$errors->get('intro')" class="mt-2" />
                        </div>

                        <!-- Youtube Id -->
                        <div class="mb-4">
                            <x-input-label for="ytid" :value="__('Youtube Id')" />
                            <div class="flex gap-x-2">
                                <x-text-input wire:model.live="ytid" id="ytid" class="block w-1/2 mt-1" type="text" name="ytid" required />
                                <x-secondary-button type="button" class="mt-1" x-on:click="viewVideo('{{ $ytid }}')">
                                    {{ __('Lihat') }}
                                </x-secondary-button>
                            </div>
                            <x-input-error :messages="$errors->get('ytid')" class="mt-2" />
                        </div>

                        <div class="flex justify-between">
                            <x-primary-button type="submit">
                                {{ __('Simpan') }}
                            </x-primary-button>

                            <x-danger-button type="button" @click="modelOpen =!modelOpen">
                                {{ __('Hapus') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>

                <div>
                    <div id="ytplayer" class="w-full mx-auto bg-gray-100 h-80"></div>
                </div>
            </div>

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

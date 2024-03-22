<div class="py-12">
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.pmbj.detail', ['pbid' => $pb->id]) }}" class="pr-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Tambah Materi') }}
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div x-data="materiData('{{$ytid}}')" class="grid w-full grid-cols-2 gap-4 p-6 text-gray-900">
                <div>
                    <p class="mb-2 text-xl font-semibold tracking-tight">Pembelajaran {{ $pb->judul }}</p>

                    <form wire:submit="save">
                        <p class="mb-1">
                            <span class="pr-1 text-sm font-medium text-gray-700">Slide:</span>
                            <span class="text-lg font-semibold">{{ $num }}</span>
                        </p>

                        <!-- Monor -->
                        <x-text-input wire:model="num" id="num" class="block w-full mt-1" type="hidden" name="num" disabled/>

                        <!-- Judul -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Nama Materi')" />
                            <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title" required autofocus />
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

                        <x-primary-button type="submit">
                            {{ __('Simpan') }}
                        </x-primary-button>
                    </form>
                </div>

                <div id="ytplayer" class="w-full mx-auto bg-gray-100 h-80"></div>
            </div>
        </div>
    </div>
</div>

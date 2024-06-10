<div class="py-12">
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.pmbj.detail', ['pbid' => $pmb->id]) }}" wire:navigate class="pr-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </a>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Edit Pembelajaran') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-2 p-6 text-gray-900 gap-x-4">
                <form wire:submit="save">
                    <!-- Monor -->
                    <x-text-input wire:model="num" id="num" class="block w-full mt-1" type="hidden" name="num" disabled/>

                    <!-- Judul -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Nama Pembelajaran')" />
                        <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <div class="inline-flex items-center">
                            <x-input-label for="image" :value="__('Banner')" />
                            <span class="pl-3 text-xs italic text-gray-400">*max-size: 1024kb</span>
                        </div>
                        <input wire:model="image" id="image"
                            class="block w-full mt-1 border py-[0.32rem] px-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            type="file"
                            accept="image/x-png,image/gif,image/jpeg"
                            name="image"
                            />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button type="submit">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </form>

                <div>
                    <img src="{{ $viewImg }}" class="object-cover w-full bg-gray-100 h-80">
                </div>
            </div>
        </div>
    </div>
</div>

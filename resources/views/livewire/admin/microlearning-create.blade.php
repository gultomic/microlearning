<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Buat Microlearning') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="w-full p-6 text-gray-900">
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

                    <x-primary-button type="submit">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>

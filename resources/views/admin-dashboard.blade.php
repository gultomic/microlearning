<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4 p-6 text-gray-900 lg:grid-cols-7">
                    <div class="col-span-2">
                        <div class="flex items-end justify-between mb-2">
                            <p class="pb-2 font-bold">Daftar Microlearning</p>
                            <a href="{{ route('admin.micl.create')}}" class="inline-flex pr-1 text-blue-500" wire:navigate>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <livewire:microlearning-index />
                    </div>

                    <div class="col-span-5">
                        <p class="pb-2 font-bold">Daftar Pencaker</p>
                        <livewire:pencaker-list />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

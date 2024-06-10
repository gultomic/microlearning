<div class="py-12">
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.micl.detail', ['mcid' => $pmb->microlearning_id]) }}" class="pr-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </a>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Pembelajaran ' . $pmb->nomor . ". " . $pmb->judul) }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="px-2">
                        <p class="mb-2 font-bold text-center uppercase border-b">Daftar materi</p>
                        @if ($pmb->materi->count() == 0)
                            <div class="p-2 mx-2 text-red-500 border border-red-500 rounded-md bg-red-200/20">Belum ada data</div>
                        @else
                            @foreach ($pmb->materi as $item)
                            <div class="flex mb-1.5">
                                <div class="w-8 px-1 text-2xl bg-gray-300">{{ $item->nomor}}.</div>
                                <div class="flex-1 px-2 bg-gray-100">
                                    <p class="font-semibold">{{ $item->judul }}</p>
                                    <div>
                                        <span class="text-xs text-gray-400">Youtube ID:</span>
                                        <span>{{ $item->refs[0]['link'] }}</span>
                                        <a
                                            href="https://www.youtube.com/watch?v={{ $item->refs[0]['link'] }}"
                                            target="_blank"
                                            class="px-2 text-xs italic text-white bg-red-400 rounded-full"
                                        >watch</a>
                                    </div>
                                </div>
                                <div class="bg-gray-100">
                                    <div class="flex gap-1 p-1">
                                        <a class="text-orange-500 " href="{{ route('admin.pmbj.detail-materi', ['mid' => $item->id])}}" wire:navigate>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                    <div>
                        <p class="mb-2 font-bold text-center uppercase border-b">Daftar peserta</p>
                        @if ($pmb->kelas->count() == 0)
                            <div class="p-2 mx-2 text-red-500 border border-red-500 rounded-md bg-red-200/20">Belum ada data</div>
                        @else
                            <div class="px-2 bg-gray-100 border rounded-lg">
                                @php $x = 1; @endphp
                                @foreach ($pmb->kelas->sortByDesc('created_at') as $att)
                                    <div class="flex gap-2">
                                        <div class="text-right">{{ $x++ }}.</div>
                                        <div class="flex-1">{{ $att->user->name }}</div>
                                        <div>{{ $att->created_at }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex justify-between mt-6" x-data="{ modelOpen: false }">
                    <x-primary-link href="{{ route('admin.pmbj.create-materi', ['pbid' => $pmb->id]) }}" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Tambah Materi') }}
                    </x-primary-link>

                    <div class="flex gap-x-2">
                        <x-primary-link class="bg-orange-500 hover:bg-orange-400" href="{{ route('admin.pmbj.edit', ['pbid' => $pmb->id]) }}" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            <span class="pl-2">Edit Pembelajaran</span>
                        </x-primary-link>
                        <x-danger-button type="button" @click="modelOpen =!modelOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <span class="pl-2">Hapus Pembelajaran</span>
                        </x-danger-button>
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
    </div>
</div>

<div class="py-12">
    <x-slot name="header">
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
                                <div>
                                    <p class="italic text-red-500">actions</p>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        <div class="mt-4">
                            <x-primary-link href="{{ route('admin.pmbj.create-materi', ['pbid' => $pmb->id]) }}" wire:navigate>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Tambah') }}
                            </x-primary-link>
                        </div>
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
            </div>
        </div>
    </div>
</div>

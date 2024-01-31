<div class="py-12">
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('admin.micl.detail', ['mcid' => $pmb->microlearning_id]) }}" class="pr-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
                    <div>
                        <p class="mb-2 font-bold text-center uppercase border-b">Daftar materi</p>
                        <div class="px-2">
                            @foreach ($pmb->materi as $item)
                            <div class="flex gap-2 mb-1.5">
                                <div class="w-8 px-1 text-2xl bg-gray-100 rounded">{{ $item->nomor}}.</div>
                                <div class="flex-1">
                                    <p class="font-semibold">{{ $item->judul }}</p>
                                    <div>
                                        <span class="text-xs text-gray-400">Youtube ID:</span>
                                        <span>{{ $item->refs[0]['link'] }}</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="italic text-red-500">actions</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="mb-2 font-bold text-center uppercase border-b">Daftar peserta</p>
                        <div class="px-2 bg-gray-100 border rounded-lg">daftar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

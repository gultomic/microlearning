<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail ' . $mcl->judul) }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <p class="mb-2 font-bold text-center uppercase border-b">Daftar pembelajaran</p>
                {{-- <ul>
                    @foreach ($mcl->pembelajaran as $item)
                    <li>
                        <a href="{{ route('admin.pmbj.detail', ['pbid' => $item->id]) }}" class="inline-flex w-full p-2 my-2 border rounded-lg">
                            <div class="pr-2 font-bold">{{ $item->nomor }}.</div>
                            <div>
                                <p class="capitalize">{{ $item->judul }}</p>
                                <p>
                                    <span>{{ $item->materi->count() }} materi</span> -
                                    <span>Mengikuti kelas: {{ $item->count_kelas }}</span>
                                </p>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul> --}}
                <livewire:pembelajaran-table :$mcid />
            </div>
        </div>
    </div>
</div>

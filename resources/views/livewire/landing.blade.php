<div>
    <div class="py-10 text-xl tracking-wide text-justify">
        {!! $body !!}
    </div>

    <div class="py-4">
        <p class="py-4 text-2xl font-semibold tracking-wide text-center sm:text-justify">Microlearning</p>

        <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 sm:mx-8">
            @foreach ($mcl as $item)
            <a
                href="{{ route('studi.index', ['mcid' => $item->id]) }}"
                class="flex flex-col justify-center h-40 p-4 text-center border rounded-lg shadow-md hover:border-2 opacity-95 group hover:opacity-100 hover:rounded-xl"
                style="border-color: {{ $item->refs['color'] }}"
                wire:navigate
            >
                <div class="flex justify-center gap-1 place-items-start">
                    <span style="color: {{ $item->refs['color'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                        </svg>
                    </span>
                    <div class="leading-3">
                        <p class="text-xl font-bold">{{ $item->judul }}</p>
                        <p>{{ $item->pembelajaran->count() }} microlearning</p>
                    </div>
                </div>
                <p class="mx-auto group-hover:pl-2" style="color: {{ $item->refs['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </p>
            </a>
            @endforeach
        </div>
    </div>

    <div class="py-4">
        <p class="py-4 text-2xl font-semibold tracking-wide text-center sm:text-justify">Layanan Kami</p>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 justify-stretch">
            <a href="https://paskerid.kemnaker.go.id/layanan-detail/4273f2f2-ded5-4710-9931-31a78adf0112" class="py-8 border rounded-md hover:border-gray-400 group">
                <img class="h-12 mx-auto" src="https://paskerid.kemnaker.go.id/storage/4273f2f2-ded5-4710-9931-31a78adf0112_Logo SIAPkerja.png" alt="siapkerja">
                <p class="pt-4 text-center group-hover:text-blue-600">SIAPKerja</p>
            </a>
            <a href="https://paskerid.kemnaker.go.id/layanan-detail/ea93475e-54d2-4358-b295-9a72d4c77015" class="py-8 border rounded-md hover:border-gray-400 group">
                <img class="h-12 mx-auto" src="https://paskerid.kemnaker.go.id/storage/ea93475e-54d2-4358-b295-9a72d4c77015_Logo Karirhub.png" alt="siapkerja">
                <p class="pt-4 text-center group-hover:text-blue-600">Karirhub</p>
            </a>
            <a href="https://paskerid.kemnaker.go.id/layanan-detail/173e7033-8219-4ddf-809c-ec5f067d718d" class="py-8 border rounded-md hover:border-gray-400 group">
                <img class="h-12 mx-auto" src="https://paskerid.kemnaker.go.id/storage/173e7033-8219-4ddf-809c-ec5f067d718d_Logo Talenthub.png" alt="siapkerja">
                <p class="pt-4 text-center group-hover:text-blue-600">Talenthub</p>
            </a>
        </div>
    </div>
</div>

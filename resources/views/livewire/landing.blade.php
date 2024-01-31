<div>
    <div class="py-4">
        {!! $body !!}
    </div>

    <div class="py-4">
        <p class="pb-2 text-lg font-bold text-center underline sm:text-justify">Microlearning</p>

        <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 sm:mx-8">
            @foreach ($mcl as $item)
            <a
                href="{{ route('studi.index', ['mcid' => $item->id]) }}"
                class="flex flex-col justify-center h-40 p-4 text-center text-gray-200 rounded-lg opacity-95 group hover:opacity-100 hover:rounded-xl"
                style="background-color: {{ $item->refs['color'] }}"
                wire:navigate
            >
                <p class="text-xl font-bold">{{ $item->judul }}</p>
                <p>{{ $item->pembelajaran->count() }} microlearning</p>
                <p class="mx-auto group-hover:pl-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </p>
            </a>
            @endforeach
        </div>
    </div>
</div>

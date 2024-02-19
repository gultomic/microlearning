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
</div>

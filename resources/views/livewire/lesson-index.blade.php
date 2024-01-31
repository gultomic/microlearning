<div>
    <div class="fixed top-0 z-10 w-full h-10 bg-gray-500">
        <div class="flex gap-2 p-2">
            <a href="/" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>

            <a href="{{ route('studi.index', ['mcid' => $pmb->microlearning->id]) }}" class="font-black">{{ $pmb->microlearning->judul }}</a>
            <p class="font-thin">{{ $pmb->judul }}</p>
        </div>
    </div>


    <div
        class="relative w-full h-screen pt-10 bg-amber-300"
        x-data="playerData({ytid:'{{ $ytid }}', material:{{ $material }}, pbid:{{ $pbid }}})"
    >
        <div>{{ $index + 1 }}/{{ count($arr) }}</div>
        <button class="disabled:text-gray-400" wire:click='toPrev' {{ $prev ? '' : 'disabled' }}>prev</button>
        <button class="disabled:text-gray-400" wire:click='toNext' {{ $next ? '' : 'disabled' }}>next</button>

        {{-- @foreach ($pmb->materi as $mat)
            @php
                $link = $mat->refs[0]['link'];
            @endphp
            <div>
                {{ $mat->id }}
                {{ $mat->nomor }}
                {{ $mat->judul }}
            </div>
        @endforeach --}}

        <div id="ytplayer" class="bg-sky-500"></div>
    </div>
</div>

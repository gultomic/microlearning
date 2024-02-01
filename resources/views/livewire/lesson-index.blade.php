<div>
    <div class="fixed top-0 z-10 w-full bg-slate-100">
        <div class="flex items-center my-auto h-14">
            <div class="flex flex-1 gap-2 p-2">
                <a href="/" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>

                <a href="{{ route('studi.index', ['mcid' => $pmb->microlearning->id]) }}" class="font-black">{{ $pmb->microlearning->judul }}</a>
                <p class="font-thin">{{ $pmb->judul }}</p>
            </div>

            <div class="flex items-center shrink-0">
                @php
                    if (Auth::user()->role === 'admin') {
                        $board = 'admin.dashboard';
                    } else {
                        $board = 'dashboard';
                    }
                @endphp
                <a href="{{ url($board) }}" class="px-1.5 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
            </div>
        </div>
    </div>


    <div
        class="relative w-full h-screen pt-14"
        x-data="playerData({ytid:'{{ $ytid }}', material:{{ $material }}, pbid:{{ $pbid }}})"
    >
        <div class="py-4">
            <div id="ytplayer" class="mx-auto bg-sky-500"></div>
        </div>

        <div class="fixed bottom-0 w-full">
            <div class="flex h-12 gap-1">
                <div class="flex-1 my-auto mr-4 text-right">
                    <span>Materi: </span>
                    <span class="text-3xl font-black">{{ $index + 1 }}/{{ count($arr) }}</span>
                </div>
                <button class="flex items-center px-4 group hover:bg-sky-100 disabled:text-gray-400" wire:click='toPrev' {{ $prev ? '' : 'disabled' }}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 rotate-180 group-hover:text-black text-sky-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                    <span class="text-xs font-black">prev</span>
                </button>
                <button class="flex items-center px-4 group hover:bg-sky-100 disabled:text-gray-400" wire:click='toNext' {{ $next ? '' : 'disabled' }}>
                    <span class="text-xs font-black">next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 group-hover:text-black text-sky-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

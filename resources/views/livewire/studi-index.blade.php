<div class="h-screen">
    <nav x-data="{ open: false }">
        <div class="flex p-2 border-b gap-x-2 place-items-center">
            <a href="/" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>
            <span class="flex-1 text-lg font-bold truncate">{{ $mcl->judul }}</span>
            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            @php $no = 1; @endphp
            @foreach ($mcl->pembelajaran as $pmb)
                <div class="flex items-center p-2 text-lg leading-4 gap-x-1 min-h-12 hover:bg-gray-100 {{$no==$pbs->id?'bg-gray-200':''}}" wire:click='pembelajaran({{ $pmb->id }})'>
                    <div>{{ $no++ }}.</div><div>{{ $pmb->judul }}</div>
                </div>
            @endforeach
        </div>
    </nav>

    <div class="flex w-full h-full">
        <div class="hidden border-r w-72 lg:block">
            @php $no = 1; @endphp
            @foreach ($mcl->pembelajaran as $pmb)
                <div class="flex p-2 text-lg leading-4 gap-x-1 min-h-12 hover:bg-gray-100 {{$no==$pbs->id?'bg-gray-200':''}}" wire:click='pembelajaran({{ $pmb->id }})'>
                    <div>{{ $no++ }}.</div><div>{{ $pmb->judul }}</div>
                </div>
            @endforeach
        </div>

        @if ($pbs)
            <div class="flex-grow lg:p-2">
                <div class="flex flex-col items-center gap-y-3">
                    <div class="bg-gray-100">
                        <img src="{{$pbs->refs['image']}}" class="object-contain" alt="banner-pembelajaran">
                    </div>

                    <p class="text-2xl font-black text-center">{{ $pbs->judul }}</p>

                    <a
                        href="{{ route('lesson.index', ['pbid' => $pbs->id, 'material' => $mat]) }}"
                        class="px-4 font-semibold text-gray-600 border rounded-xl hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        wire:navigate
                    >
                    @auth
                        Ikuti Kelas
                    @else
                        Login untuk mengikuti Kelas
                    @endauth
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

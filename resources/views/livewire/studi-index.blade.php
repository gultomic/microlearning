<div class="h-screen">
    <div class="flex gap-2 p-2 border-b">
        <a href="/" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
        <span class="text-lg font-bold">{{ $mcl->judul }}</span>
    </div>
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
            <div class="flex-grow p-2">
                <div class="flex flex-col items-center gap-y-3">
                    <div class="w-[580px] h-[320px] bg-gray-100">
                        <img src="{{$pbs->refs['image']}}" alt="banner-pembelajaran">
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

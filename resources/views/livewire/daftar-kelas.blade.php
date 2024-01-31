<div class="p-6 text-gray-900">
    <p class="pb-2 font-bold">Daftar Mengikuti Kelas:</p>

    <div>
        @foreach ($list as $item)
            <div class="inline-flex gap-2">
                <img src="{{$item->pembelajaran->refs['image']}}" class="w-auto h-14" alt="">
                <div>
                    <p class="font-bold uppercase">{{ $item->pembelajaran->judul }}</p>
                    progres belajar:
                    @foreach ($item->pembelajaran->materi as $materi)
                        <div>
                            {{ $materi->nomor}}.
                            {{ $materi->judul }}
                            @if ($materi->status)
                                <span class="text-xs italic text-blue-500">done</span>
                            @else
                                <span class="text-xs italic text-red-500">not yet</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="p-6 text-gray-900">
    <p class="pb-2 font-bold">Daftar Mengikuti Kelas:</p>

    <div>
        @foreach ($list as $item)
            <div class="inline-flex gap-2 mb-6">
                <img src="{{$item->pembelajaran->refs['image']}}" class="h-16 bg-gray-300 w-28" alt="">
                <div>
                    @php
                        $mc = $item->pembelajaran->materi->count();
                        $sc = $item->pembelajaran->materi()->whereHas('status')->count();
                        $ts = ($sc/$mc);

                        if ($ts < 1) {
                            $ls = $item->pembelajaran->materi()
                                ->doesntHave('status')
                                ->orderBy('nomor')
                                ->first()
                                ->id;
                        }
                    @endphp

                    <p class="font-bold uppercase">{{ $item->pembelajaran->judul }}</p>
                    <p>Progres belajar: </p>

                    @foreach ($item->pembelajaran->materi as $materi)
                        <div>
                            {{ $materi->nomor}}.
                            {{ $materi->judul }}
                            @if ($materi->status->where('kelas_id', $item->id)->count() != 0)
                                <span class="text-xs italic text-blue-500">done</span>
                            @else
                                <span class="text-xs italic text-red-500">not yet</span>
                            @endif
                        </div>
                    @endforeach

                    @if ($ts < 1)
                    <div class="pt-2">
                        <a class="inline-flex items-center px-6 py-1 bg-blue-600 rounded-full text-blue-50"
                            href="{{ route('lesson.index', ['pbid' => $item->pembelajaran->id, 'material' => $ls]) }}"
                        >Lanjutkan belajar!</a>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

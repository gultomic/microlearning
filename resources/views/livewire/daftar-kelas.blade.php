<div class="p-6 text-gray-900">
    <div>
        @if ($list->count() == 0)
            <p class="inline-flex items-end pb-2 font-medium text-rose-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                </svg>
                <span class="pl-2">
                    Anda belum mengikuti kelas, silahkan pilih kelas...
                </span>
            </p>

            <div class="grid justify-center grid-cols-1 gap-6 my-4 sm:grid-cols-2 lg:grid-cols-3">
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
        @else
            <p class="pb-2 font-bold">Daftar Mengikuti Kelas:</p>
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
        @endif
    </div>
</div>

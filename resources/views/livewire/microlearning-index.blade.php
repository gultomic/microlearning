<div class="p-6 text-gray-900">
    <div>
        <p class="pb-2 font-bold">Daftar Microlearning</p>

        <div class="flex gap-2">
            @foreach ($micl as $item)
                <a
                    href="{{ route('admin.micl.detail', ['mcid' => $item->id]) }}"
                    class="p-4 text-gray-100 border rounded-lg"
                    style="background-color: {{ $item->refs['color']}}"
                    wire:navigate
                >
                    <p class="text-lg font-black">{{ $item->judul }}</p>
                    <div>{{ $item->pembelajaran->count() }} Pembelajaran</div>
                    {{-- <div>{{ $item->pembelajaran->sum('count_kelas') }} Mengikuti</div> --}}
                </a>
            @endforeach
        </div>
    </div>

    <div class="pt-6">
        <p class="pb-2 font-bold">Daftar Pencaker</p>

        <div>
            @foreach ($userList as $user)
                <div>{{ $user->name }} - {{ $user->refs['telp']}} - {{ $user->access }} - {{ $user->created_at }}</div>
            @endforeach
        </div>
    </div>
</div>

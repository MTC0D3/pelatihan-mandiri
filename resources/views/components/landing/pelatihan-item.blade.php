@props(['pelatihan'])
<div class="rounded-lg bg-slate-800 shadow-custom">
    <img class="rounded-t-lg" src="{{ $pelatihan->image }}" alt="pelatihan image">
    <div class="p-4 text-center md:p-5">
        <h1 class="text-2xl font-semibold text-white">{{ $pelatihan->name }}</h1>
    </div>
    <div class="p-4 border-t border-dashed border-slate-700">
        <div class="flex gap-1">
            @if (
                !auth()->user()
                    ?->hasRole('admin'))
                <a href="{{ route('member.pendaftaran.create') }}"
                    class="flex px-4 py-2 text-sm text-white bg-indigo-500 rounded-lg hover:scale-110 hover:duration-200">
                    Daftar Sekarang
                </a>
            @endif
        </div>
    </div>
</div>

<div class="w-full p-3 border border-dashed bg-slate-800 border-slate-700">
    <div class="container mx-auto">
        <div class="flex items-center justify-end">
            <div class="flex flex-row items-center gap-2">
                <form action="{{ $url }}" method="GET" class="flex items-center gap-1">
                    <input type="text" placeholder="Cari disini..."
                        class="p-2 text-sm text-white border rounded-lg bg-slate-900 focus:outline-none focus:ring-1 focus:ring-slate-700 border-slate-800"
                        name="search" value="{{ request()->search }}" />
                    <button type="submit"
                        class="p-2 text-sm text-white border rounded-lg bg-slate-900 focus:outline-none focus:ring-1 focus:ring-slate-500 border-slate-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon icon-tabler icon-tabler-search"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="10" cy="10" r="7"></circle>
                            <line x1="21" y1="21" x2="15" y2="15"></line>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-row w-full sticky top-0 justify-between items-center px-10 py-6 bg-content shadow-md">
    <div>
        <input type="checkbox" id="menu-toggle" class="hidden">
        <label for="menu-toggle" class="space-y-1 p-2 block">
            <div class="w-10 h-[5px] bg-gray-700 transition-all duration-300 rounded-full"></div>
            <div class="w-8 h-[5px] bg-gray-700 transition-all duration-300 rounded-full"></div>
            <div class="w-6 h-[5px] bg-gray-700 transition-all duration-300 rounded-full"></div>
        </label>
    </div>
    <div class="flex gap-6 items-center bg-gray-300 px-6 transition duration-300 rounded-lg">
        {{-- Buat search dengan js --}}
        <label for="search" class="pt-2">
            <i class="fi fi-rr-search text-3xl"></i>
        </label>
        <input type="text" id="search"
            class="w-[22rem] text-xl h-14 bg-inherit focus:outline-none focus:ring-0 focus:border-transparent placeholder:text-slate-500 "
            placeholder="Search">
    </div>
</div>

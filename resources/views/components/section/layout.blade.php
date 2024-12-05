<div class="flex h-screen">
      <x-section.sidebar></x-section.sidebar>
    <div class="flex flex-col w-full h-full overflow-auto">
        <x-section.navbar></x-section.navbar>
        <div class="flex m-8 bg-content h-full">
            <div class="p-7 overflow-y-scroll">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
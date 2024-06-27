<div>
    <div class=" flex flex-col justify-center items-center border-4 border-red-500 h-[700px]">
        <div class=" pb-4 text-xl">
            <h2>View {{ $itemName }}</h2>
        </div>


        <div
            class="sm:h-[500px] sm:w-[800px] border-4  border-slate-500 bg-slate-300 flex flex-col gap-6 p-4 rounded-xl">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class=" text-gray-950" />
                <x-text-input id="name" class="block mt-1 w-full bg-slate-200 " type="text" name="name"
                    value="{{ $item->name }}" required autofocus autocomplete="name" disabled />
            </div>

            <!-- Level -->
            @if ($item->level)
                <div>
                    <x-input-label for="level" :value="__('Level')" class=" text-gray-950" />
                    <x-text-input id="level" class="block mt-1 w-full bg-slate-200" type="text" level="level"
                        value="{{ $item->level }}" required autofocus autocomplete="level" disabled />
                </div>
            @endif

            <!-- Level -->
            @if ($item->code)
                <div>
                    <x-input-label for="code" :value="__('Code')" class=" text-gray-950" />
                    <x-text-input id="code" class="block mt-1 w-full bg-slate-200" type="text" code="code"
                        value="{{ $item->code }}" required autofocus autocomplete="code" disabled />
                </div>
            @endif
            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" class=" text-gray-950" />
                <x-text-area-box class="block mt-1 w-full bg-slate-200 resize-none" name="description" disabled>
                    {{ $item->description }}
                </x-text-area-box>
            </div>
            <div class="flex justify-center">
                <x-go-back-link :itemIndexPage=$itemName />
            </div>
        </div>



    </div>
</div>

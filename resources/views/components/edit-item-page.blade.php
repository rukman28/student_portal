<div class="flex flex-col justify-center items-center border-4 border-red-500 h-[700px]">

    <div class=" pb-4 text-xl">
        <h2>Edit {{ $itemName }}</h2>
    </div>

    <form action="{{ route($updatePath, $item) }}" method="POST">
        @csrf
        @method('PUT')
        <div
            class="sm:h-[500px] sm:w-[800px] border-4  border-slate-500 bg-slate-300 flex flex-col gap-6 p-4 rounded-xl">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class=" text-gray-950" />
                <x-text-input id="name" class="block mt-1 w-full " type="text" name="name"
                    value="{{ $item->name }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            <!-- Level -->
            @if ($item->level)
                <div>
                    <x-input-label for="level" :value="__('Level')" class=" text-gray-950" />
                    <x-text-input id="level" class="block mt-1 w-full" type="text" name="level"
                        value="{{ $item->level }}" required autofocus autocomplete="level" />
                    <x-input-error :messages="$errors->get('level')" class="mt-2" />

                </div>
            @endif

            <!-- Code -->
            @if ($item->code)
                <div>
                    <x-input-label for="code" :value="__('Code')" class=" text-gray-950" />
                    <x-text-input id="code" class="block mt-1 w-full" type="text" name="code"
                        value="{{ $item->code }}" required autofocus autocomplete="code" />
                    <x-input-error :messages="$errors->get('code')" class="mt-2" />

                </div>
            @endif
            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" class=" text-gray-950" />
                <x-text-area-box class="block mt-1 w-full resize-none" name="description">
                    {{ $item->description }}
                </x-text-area-box>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </div>

            <div class="flex justify-center gap-2">
                <x-primary-button class="ml-3 ">
                    {{ __('Update') }}
                </x-primary-button>

                <x-primary-button class="ml-3" type='reset'>
                    {{ __('Reset') }}
                </x-primary-button>
            </div>
    </form>
</div>

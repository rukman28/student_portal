{{-- This compnonnet Create page is only used for the programme items as it has level field --}}

<div class="flex flex-col justify-center items-center border-4 border-red-500 h-[700px]">

    <div class=" pb-4 text-xl">
        <h2>Create Module</h2>
    </div>

    <form action="{{ route('module.store') }}" method="POST">
        @csrf
        <div
            class="sm:h-[500px] sm:w-[800px] border-4  border-slate-500 bg-slate-300 flex flex-col gap-6 p-4 rounded-xl">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class=" text-gray-950" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <!-- Code -->
            <div>
                <x-input-label for="code" :value="__('Code')" class=" text-gray-950" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')"
                    required autofocus autocomplete="code" />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" class=" text-gray-950" />
                <x-text-area-box name="description" id="description" class="block mt-1 w-full resize-none"
                    type="text" description="description" required autofocus autocomplete="description"
                    placeholder="Describe yourself here...">{{ old('description') }}</x-text-area-box>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </div>


            <div class="flex justify-center gap-2">
                <x-primary-button class="ml-3 ">
                    {{ __('Create') }}
                </x-primary-button>

                <x-primary-button class="ml-3" type='reset'>
                    {{ __('Reset') }}
                </x-primary-button>
            </div>
    </form>
</div>

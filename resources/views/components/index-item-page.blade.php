{{-- This page component will accept the following variables
$itemsName
$items

and then render the index pages for
Programmes, Modules, Practicals, Skill Categories, and Skills.
The "level" column is displayed only on the Programme index page.
--}}

<div class="flex justify-center sm:h-[46rem] ">
    <div
        class=" flex flex-col  justify-between border-8 border-slate-500 sm:h-[700px] mt-4 pb-4 pt-8 px-4 bg-slate-300 rounded-xl shadow-xl">


        <table class="rounded-t-lg  sm:w-[900px] ">
            <caption>
                <p class=" text-center font-bold text-xl ">{{ $itemsName }}</p>
            </caption>
            @if ($items->count())
                <tr class="text-left border-b-4 border-b-yellow-700 ">
                    <th class="px-4 py-3">Name</th>

                    {{-- The following condition executes only when the items are Programmes as they have 'level' field --}}
                    @if ($items->first()->level)
                        <th class="px-4 py-3">Level</th>
                    @endif

                    {{-- The following condition executes only when the items are Modules as they have 'code' field --}}
                    @if ($items->first()->code)
                        <th class="px-4 py-3">Code</th>
                    @endif

                    <th class=" px-4 sm:pl-44 py-3">Actions</th>
                </tr>
            @endif
            @forelse ($items as $item)
                <tr class=" border-b-2 border-slate-200 hover:bg-slate-200">
                    <td class="px-4 py-3">{{ $item->name }}</td>

                    {{-- The following condition executes only when the items are Programmes as they have 'level' field --}}
                    @if ($item->level)
                        <td class="px-4 py-3">{{ $item->level }}</td>
                    @endif

                    {{-- The following condition executes only when the items are Programmes as they have 'level' field --}}
                    @if ($item->code)
                        <td class="px-4 py-3">{{ $item->code }}</td>
                    @endif

                    <td class="px-4 py-3">
                        <div class="flex gap-2 justify-center">
                            <x-form-delete-button :actionRoute=Str::lower(Str::singular($itemsName)) type='delete'
                                :$item />
                            <x-edit-link-button :editRoute=Str::lower(Str::singular($itemsName)) :$item />
                            <x-show-link-button :showRoute=Str::lower(Str::singular($itemsName)) :$item
                                class="bg-yellow-600 hover:bg-yellow-700" />
                        </div>
                    </td>


                </tr>
            @empty
                <div class="flex justify-center items-center  sm:h-[500px]">
                    <h2 class=" text-2xl font-bold text-red-700">There are no records to show.</h2>
                </div>
            @endforelse


        </table>
        {{ $items->onEachSide(2)->links() }}

        <div class="flex justify-end pt-4 sm:pt-0">
            <x-add-new-item-link :linkRoute=Str::lower(Str::singular($itemsName))>
                Add New {{ Str::singular($itemsName) }}
            </x-add-new-item-link>

        </div>

    </div>
</div>

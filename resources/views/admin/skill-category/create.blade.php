<x-app-layout logoutPath='admin.'>
    <x-slot name="header">
        <x-dashboard-name />

    </x-slot>

    <x-create-item-page itemName='SkillCategory' storePath='skillcategory.store' />
</x-app-layout>

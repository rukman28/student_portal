<x-app-layout logoutPath='admin.'>
    <x-slot name="header">
        <x-dashboard-name />

    </x-slot>

    <x-create-item-page itemName='Skill' storePath='skill.store' />
</x-app-layout>

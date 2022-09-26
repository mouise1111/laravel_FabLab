<x-layout>
    <x-admin.nav>
    </x-admin.nav>
    <x-admin.user-table :users="$users" />
    <a href="{{ route('register') }}" class="btn btn-primary">Create a new user</a>
</x-layout>

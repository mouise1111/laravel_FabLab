<x-layout>
    <x-admin.nav>
    </x-admin.nav>
    <x-admin.products-table :products="$products" />
    <a href="{{ route('admin.create-product') }}" class="btn btn-primary">Create a new product</a>
</x-layout>

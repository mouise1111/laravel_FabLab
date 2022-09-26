@props(['products'])
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Company</th>
            <th scope="col">Price</th>
            <th scope="col">Created at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">
                    {{ $product->id }}
                </th>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->company }}
                </td>
                <td>
                    {{ $product->price }} EUR
                </td>
                <td>
                    @php
                        $dateCreated = new DateTime($product->created_at);
                        $now = new DateTime();
                        
                        $createdDiff = $dateCreated->diff($now)->format('%d days, %h hours and %i minutes');
                    @endphp
                    {{ $createdDiff }}
                </td>
                {{-- <td>
                    {{ $product->unique_id }}
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>

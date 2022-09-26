@props(['users'])
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
            <th scope="col">Card Value</th>
            {{-- <th scope="col">Unique Id</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">
                    {{ $user->id }}
                </th>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @php
                        $dateCreated = new DateTime($user->created_at);
                        $now = new DateTime();
                        
                        $createdDiff = $dateCreated->diff($now)->format('%d days, %h hours and %i minutes');
                    @endphp
                    {{ $createdDiff }}
                </td>
                {{-- <td>
                    {{ $user->unique_id }}
                </td> --}}

                <td>
                    {{ $user->value }}
                    {{-- {{ $card->value }} --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@props(['payments'])
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
            <th scope="col">amount</th>
            <th scope="col">Time of payment</th>
            {{-- <th scope="col">Unique Id</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $payment)
            <tr>
                <th scope="row">
                    {{ $payment->id }}
                </th>
                <td>
                    {{ $payment->payer_email }}
                </td>
                <td>
                    {{ $payment->amount }}
                </td>
                <td>
                    @php
                        $dateCreated = new DateTime($payment->created_at);
                        $now = new DateTime();
                        
                        $createdDiff = $dateCreated->diff($now)->format('%d days, %h hours and %i minutes ago');
                    @endphp
                    {{ $createdDiff }}
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr> --}}
    </tbody>
</table>

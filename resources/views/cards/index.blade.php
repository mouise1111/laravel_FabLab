<x-layout>

    <div class="card text-center">
        <div class="card-header">
            {{ Auth::user()->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $card->value }} EUR</h5>
            <p class="card-text">Created: {{ $created }}</p>
            <a href="/card/{{ $card->id }}/recharge" class="btn btn-primary">Recharge card</a>
        </div>
        <div class="card-footer text-muted">
            Last updated: {{ $updated }}
        </div>
    </div>

</x-layout>

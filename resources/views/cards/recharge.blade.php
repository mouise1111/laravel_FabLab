<x-layout>
    <form method="POST" action="/card/payment/{{ $card->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h3>How much would you like to add to your card?</h3>
            <label for="value" class="form-label">Value in EUR</label>
            <input type="number" class="form-control" id="value" name="value">
            @error('value')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Proceed to payment</button>
    </form>
</x-layout>

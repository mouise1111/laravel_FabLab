<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CardController extends Controller
{
    // index card page
    public function index(Card $card)
    {
        $dateCreated = new DateTime($card->created_at);
        $dateUpdated = new DateTime($card->updated_at);
        $now = new DateTime();

        $createdDiff = $dateCreated->diff($now)->format("%d days, %h hours and %i minutes");
        $updatedDiff = $dateUpdated->diff($now)->format("%h hours, %i minutes and %s seconds");
        return view('cards.index', [
            'card' => $card,
            'created' => $createdDiff,
            'updated'  => $updatedDiff
        ]);
    }

    public function recharge(Card $card)
    {
        return view(
            'cards.recharge',
            [
                'card' => $card
            ]
        );
    }

    public function payment(Card $card, Request $request)
    {
        $formFields = $request->validate(
            [
                'card' => $card,
                'value' => ['required', 'integer']
            ]
        );

        $formFields['value'] = $formFields['value'] + $card->value;
        $card->update($formFields);

        return redirect('/card/' . $card->id);
    }

    //this is for the cart
    public function checkout(Card $card, Request $request)
    {
        $formFields = $request->validate(
            [
                'value' => 'required'
            ]
        );

        $card = Auth::user()->card;
        if (Cart::count() == 0) {
            return redirect('/cart')->with('warning', 'Cart must have at least one item');
        } else {
            if (($card->value - $formFields['value']) > 0) {
                $formFields['value'] = $card->value - $formFields['value'];
                $card->update($formFields);

                Cart::destroy();
                return redirect('/')->with('succes', 'Payment was a succes');
            } else {
                return back()->with('error', 'Card does not have the required funds');
            }
        }
    }
}
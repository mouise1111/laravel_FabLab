<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use DateTime;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }


    public function users()
    {
        return view(
            'admin.users.index',
            [
                // 'users' => User::all()
                'users' => DB::table('users')
                    ->join('cards', 'users.id', '=', 'cards.user_id')
                    ->get()

            ]
        );
    }
    public function products()
    {
        return view(
            'admin.products.index',
            [
                'products' => Product::all()
            ]
        );
    }

    public function payments()
    {
        return view(
            'admin.payments.index',
            [
                'payments' => Payment::all()
            ]
        );
    }
}
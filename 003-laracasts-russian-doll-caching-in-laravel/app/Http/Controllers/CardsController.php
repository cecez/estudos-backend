<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::all();

        return view('cards.index', compact('cards'));
    }
}

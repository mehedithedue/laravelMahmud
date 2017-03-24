<?php
namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardControll extends Controller
{
    public function index()
    {

        $card = card::all();

        return view('cards.index', compact('card'));
    }

    public function show($idd)
    {
        $card = card::find($idd);
        return view('cards.show', compact('card'));
    }
}

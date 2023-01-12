<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offers;
use App\User;
use App\Cicles;
use App\Applied;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cicles = Cicles::all();
        $userId = auth()->id();
        $offers = Offers::select('offers.id', 'offers.title', 'offers.description', 'offers.num_candidates', 'offers.created_at', 'offers.updated_at', 'offers.deleted', 'applieds.offer_id', 'applieds.user_id')
                ->leftJoin('applieds', function($join) use ($userId) {
                 $join->on('offers.id', '=', 'applieds.offer_id')
                      ->where('applieds.user_id', '=', $userId);
              })
              ->whereNull('applieds.id')
              ->where('offers.deleted', 0)
              ->get();
        return view('home', compact('cicles', 'offers'));
    }

    public function apply(Request $request, $offer_id)
    {
        $user = User::find(auth()->id());
        $offer = Offers::find($offer_id);

        $apply = new Applied;
        $apply->user_id = auth()->id();
        $apply->offer_id = $offer->id;
        $apply->save();
        
        $offer->num_candidates = $offer->num_candidates + 1;
        $offer->update();

        return redirect('home');
    }
}

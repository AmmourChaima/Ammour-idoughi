<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\Polyclinique;
use App\Models\Vaccin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class UserController extends Controller
{
    public function home()
    {
        $vaccins = Vaccin::all();
        return view('user.home', ['vaccins' => $vaccins]);
    }
    
    public function polycliniques(Request $request)
    {
        $vaccin = Vaccin::find($request->vaccin);
        $polys = $vaccin->polycliniques()->get();
        return view('user.polycliniques', ['polys' => $polys, 'vaccin' => $vaccin]);
    }

    public function reservation(Request $request)
    {
        $poly = Polyclinique::find($request->polyclinique_id);
        return view('user.reservation', ['poly' => $poly]);
    }

    public function rdvs()
    {
        $user_id = Auth::user()->id;
        $rdvs = Rdv::where('user_id', $user_id)->get();
        foreach($rdvs as $rdv)
        {
            $rdv->polyclinique = Polyclinique::find($rdv->polyclinique_id)->name;
            $rdv->vaccin = Vaccin::find($rdv->vaccin_id)->name;
        }
        return view('user.rdvs', ['rdvs' => $rdvs]);
    }

    public function reserver (Request $request)
    {
        $poly = Polyclinique::find($request->polyclinique_id);
        $user = Auth::user();
        $vaccin = Vaccin::find($request->vaccin);
        $firstshot = Carbon::createFromFormat('m/d/Y',  $request->date);
        $secondshot = Carbon::createFromFormat('m/d/Y',  $request->date)->addMonth(1);
        
        $rdv = new Rdv();
        $rdv->polyclinique_id = $poly->id;
        $rdv->user_id = $user->id;
        $rdv->vaccin_id = $vaccin->id;
        $rdv->first_shot = $firstshot;
        $rdv->second_shot = $secondshot;
        $rdv->save();

        return redirect('/rdvs');
    }

    public function expand(Request $request)
    {
        $rdv = Rdv::find($request->id);
        $firstshot = Carbon::createFromFormat('Y-m-d', $rdv->first_shot)->addMonth(3);
        $rdv->first_shot = $firstshot;
        $secondshot = Carbon::createFromFormat('Y-m-d', $rdv->second_shot)->addMonth(3);
        $rdv->second_shot = $secondshot;        
        $rdv->extended = true;
        $rdv->save();

        return redirect('/rdvs');
    }
}

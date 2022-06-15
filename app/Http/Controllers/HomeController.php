<?php

namespace App\Http\Controllers;

use App\Models\Polyclinique;
use Illuminate\Http\Request;
use App\Models\Rdv;
use App\Models\User;
use App\Models\Vaccin;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function acceuil()
    {
        if(Auth::user())
        {
            return redirect('/home');
        }
        // else if (Auth::polyclinique())
        // {
        //    return redirect('/poly/dashboard');
        // }
        return view('acceuil');
    }

    public function verifypass(Request $request)
    {
        $rdvs = Rdv::where('qr_id', $request->id)->get();
        if($rdvs->isEmpty()) return view ('qrcode', ['valid' => false]);
        $rdv = $rdvs->first();
        $rdv->user = User::find($rdv->user_id)->name;
        $rdv->polyclinique = Polyclinique::find($rdv->polyclinique_id)->name;
        $rdv->vaccin = Vaccin::find($rdv->vaccin_id)->name;
        $rdv->qr_url = config('app.url').'/pass/'.$rdv->qr_id;
        return view ('qrcode', ['rdv' => $rdv,'valid' => true]);
    }
}

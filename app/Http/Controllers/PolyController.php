<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\PolyAuthController;
use App\Models\Polyclinique;
use App\Models\Rdv;
use App\Models\User;
use App\Models\Vaccin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PolyController extends Controller
{
    public function dashboard(Request $request)
    {
        $rdvs = Rdv::where('polyclinique_id', Auth::user()->id)->get();
        $pending = $rdvs->where('confirmed' ,false)->where('reported', false)->count();
        $fully = $rdvs->where('confirmed', true)->count();
        $inscrit = $rdvs->count();
        return view('poly.dashboard', ['inscrit' => $inscrit, 'pending' => $pending, 'fully'=> $fully]);
    }

    public function profile(Request $request)
    {
        $vaccins = Vaccin::all();
        $polyvaccins = Polyclinique::find(Auth::user()->id)->vaccins()->get();
        return view('poly.profile', ['vaccins' => $vaccins, 'polyvaccins'=>$polyvaccins]);
    }

    public function updateProfile(Request $request)
    {
        $poly = Polyclinique::find(Auth::user()->id);
        $poly->name = $request->name;
        $poly->email = $request->email;

        $poly->vaccins()->detach();

        foreach($request->vaccin as $vaccinid)
        {
            $vaccin = Vaccin::find($vaccinid);
            $poly_vac = $poly->vaccins()->where('vaccin_id', $vaccinid)->get();
            if(!count($poly_vac) > 0)
            {
                $poly->vaccins()->attach($vaccin);
            }            
        }
        $poly->save();
        return redirect('/poly/dashboard');
    }

    public function mesRdv()
    {
        $rdvs = Rdv::where('polyclinique_id', Auth::user()->id)->get();
        foreach($rdvs as $rdv)
        {
            $rdv->user_name = User::find($rdv->user_id)->name;
        }
        return view ('poly.rdv',['rdvs' => $rdvs]);
    }

    public function Adduserform()
    {
        return view ('poly.adduser');
    }

    public function AddUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->active = 1;
        $user->password = Hash::make($request->password);
        $user->polyclinique_id = Auth::user()->id;
        $user->save();

        return redirect('/poly/dashboard');
    }

    public function signaler(Request $request)
    {
        $rdv = Rdv::find($request->id);
        $rdv->reported = true;
        $rdv->save();

        return redirect('/poly/rdv');
    }

    public function confirmer(Request $request)
    {
        $rdv = Rdv::find($request->id);
        $rdv->confirmed = true;
        $rdv->qr_id = Str::random(50);
        $rdv->save();
        
        return redirect('/poly/rdv');
    }
}

@extends('poly.poly')
 
@section('title', 'Dashboard')
@section('content')

    <div class="col-lg-6">
        <form action="/poly/adduser" method="POST">
            @csrf
            <div>
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Ajouter un utilisateur</h1>
                    </div>
                    <input type="text" value="{{Auth::user()->id}}" name="polyclinique_id" hidden>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-6 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name="email"
                                placeholder="Email Address" >
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password"
                                placeholder="Password">
                        </div>

                        <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block">
                            Ajouter
                        </button>
                    <hr>
                </div>
            </div>
        
        </form>
        
    </div>
@stop



        
@extends('poly.poly')
 
@section('title', 'Dashboard')
@section('content')

    <div class="col-lg-6">
        <form action="/poly/profile" method="POST">
            @csrf
            <div>
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Profile</h1>
                    </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-6 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                placeholder="Name" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name="email"
                                placeholder="Email Address" value="{{Auth::user()->email}}">
                        </div>
                        
                        <p>Vaccins disponible pour le moment:  @foreach($polyvaccins as $polyvaccin)
                        <span style="color: red">{{$polyvaccin->name}}.</span>   
                        @endforeach
                        </p>
                        <br>
                        <p>Veuillez sélectionner à nouveau les vaccins disponible</p>   

                        <div class="form-group">
                            @foreach($vaccins as $vaccin)
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" value="{{$vaccin->id}}" id="{{$vaccin->id}}" name="vaccin[]">
                                <label class="custom-control-label" for="{{$vaccin->id}}">{{$vaccin->name}}</label>
                            </div>
                            @endforeach
                        </div>


                        <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block">
                            Update
                        </button>
                    <hr>
                </div>
            </div>
        
        </form>
        
    </div>
@stop



        
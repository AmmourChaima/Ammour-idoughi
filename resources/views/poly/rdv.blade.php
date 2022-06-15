@extends('poly.poly')
 
@section('title', 'Rendez-vous')
@section('content')

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>1er rdv</th>
                            <th>2er rdv</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>1er rdv</th>
                            <th>2er rdv</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    {{-- example --}}
                    <tbody>
                        @if (count($rdvs) > 0)
                        @foreach($rdvs as $rdv)
                        <tr>
                            <td>{{$rdv->user_name}}</td>
                            <td>{{$rdv->first_shot}}</td>
                            <td>{{$rdv->second_shot}}</td>
                            <td>
                                @if(!$rdv->confirmed && !$rdv->reported)
                                <a href="/poly/rvd/signaler/{{$rdv->id}}" class="btn btn-danger">Signaler</a> 
                                <a href="/poly/rvd/confirmer/{{$rdv->id}}" class="btn btn-primary">Confirmer</a>
                                @elseif($rdv->confirmed)
                                Rendez-vous terminé
                                @else 
                                Rendez-vous signalé
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop



        
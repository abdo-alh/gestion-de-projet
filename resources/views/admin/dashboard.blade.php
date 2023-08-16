@extends('adminlte::page')


@section('content_header')
<h1>Acceuil</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $projetCount }}</h3>
                    <p>Total Des projets</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <a href="/projet/index" class="small-box-footer">
                    Afficher <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{ $commentaireCount }}</h3>
                    <p>Commentaires</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="/commentaire/index" class="small-box-footer">
                    Afficher <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3>{{ $employeCount }}</h3>
                    <p>Employés Enregistrés</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="/employe/index" class="small-box-footer">
                    Afficher <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header">
                    <div class="text-center fontèweight-bold text-uppercase">
                        <h4>Liste des Projets</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Titre</th>
                                <th>Budget</th>
                                <th>Période Estimée</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Chef de projet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projets as $projet)
                            <tr>
                                <td>{{$projet->reference}}</td>
                                <td>{{$projet->titre}}</td>
                                <td>{{$projet->budget}}</td>
                                <td>{{$projet->periodeestimeee}}</td>
                                <td>{{$projet->datedebut}}</td>
                                <td>{{$projet->datefin}}</td>
                                <td>{{$projet->matriculation}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
</div>
@endsection
@extends('adminlte::page')


@section('content_header')
<h1>Acceuil</h1>
@endsection

@section('content')
<div class="container">
    @if (auth()->user()->role == 'admin')
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
    @endif
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
                            @foreach ($projets as $projet)
                            @if (auth()->user()->role == 'user')
                            @if (auth()->user()->email == $projet->employe->email)
                            <tr>
                                <td>{{ $projet->reference }}</td>
                                <td>{{ $projet->titre }}</td>
                                <td>{{ $projet->budget }}</td>
                                <td>{{ $projet->periodeestimeee }}</td>
                                <td>{{ $projet->datedebut }}</td>
                                <td>{{ $projet->datefin }}</td>
                                <td>{{ $projet->employe->nom }} {{ $projet->employe->prenom }}</td>
                            </tr>
                            @endif
                            @else
                            <tr>
                                <td>{{ $projet->reference }}</td>
                                <td>{{ $projet->titre }}</td>
                                <td>{{ $projet->budget }}</td>
                                <td>{{ $projet->periodeestimeee }}</td>
                                <td>{{ $projet->datedebut }}</td>
                                <td>{{ $projet->datefin }}</td>
                                <td>{{ $projet->employe->nom }} {{ $projet->employe->prenom }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card my-5">
                <div class="card-header">
                    <div class="text-center fontèweight-bold text-uppercase">
                        <h4>Liste des Commentaires</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date de publication</th>
                                <th>Nom</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commentaires as $commentaire)
                            @if (auth()->user()->role == 'user')
                            @if (auth()->user()->email == $commentaire->employe->email)
                            <tr>
                                <td>{{$commentaire->description}}</td>
                                <td>{{$commentaire->date_de_publication}}</td>
                                <td>{{$commentaire->employe->nom}} {{$commentaire->employe->prenom}}</td>
                                <td>
                                    <a href="{{route('commentaire.edit',$commentaire->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$commentaire->id}}" action="{{route('commentaire.destroy',$commentaire->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onClick="return confirm('Voulez-vous vraiment supprimer cette commentaire ?')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @else
                            <tr>
                                <td>{{$commentaire->description}}</td>
                                <td>{{$commentaire->date_de_publication}}</td>
                                <td>{{$commentaire->employe->nom}} {{$commentaire->employe->prenom}}</td>
                                <td>
                                    <a href="{{route('commentaire.edit',$commentaire->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$commentaire->id}}" action="{{route('commentaire.destroy',$commentaire->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onClick="return confirm('Voulez-vous vraiment supprimer cette commentaire ?')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="card my-5">
                <div class="card-header">
                    <div class="text-center fontèweight-bold text-uppercase">
                        <h4>Liste des Phases</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Référence du projet</th>
                                <th>Durée</th>
                                <th>Statut</th>
                                <th>Respensable de la phase</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phases as $phase)
                            @if (auth()->user()->role == 'user')
                            @if (auth()->user()->email == $phase->employe->email)
                            <tr>
                                <td>{{$phase->nom}}</td>
                                <td>#{{$phase->projet->reference}}</td>
                                <td>{{$phase->duree}}</td>
                                <td>{{$phase->statut}}</td>
                                <td>{{$phase->employe->nom}} {{$phase->employe->prenom}}</td>
                            </tr>
                            @endif
                            @else
                            <tr>
                                <td>{{$phase->nom}}</td>
                                <td>#{{$phase->projet->reference}}</td>
                                <td>{{$phase->duree}}</td>
                                <td>{{$phase->statut}}</td>
                                <td>{{$phase->employe->nom}} {{$phase->employe->prenom}}</td>
                                <td>
                                    <a href="{{route('phase.edit',$phase->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$phase->id}}" action="{{route('phase.destroy',$phase->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onClick="return confirm('Voulez-vous vraiment supprimer cette phase ?')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endif
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
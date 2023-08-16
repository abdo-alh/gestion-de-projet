@extends('adminlte::page')
@section('title')
Modifier Phase | Application de gestion des projets
@endsection

@section('content')
<div class="container">
    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header">
                    <div class="text-center font-weight-bold text-uppercase">
                        <h4>Modifier Phase</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('phase.update',$phase->id)}}" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Réference du projet</label>
                                    <select name="reference" class="form-control">
                                        @foreach($projets as $projet)
                                        <option value="{{ $projet->reference }}" {{ $projet->reference == $phase->reference ? 'selected' : '' }}>#{{ $projet->reference }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{old('nom',$phase->nom)}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Durée</label>
                                    <input type="number" class="form-control" name="duree" placeholder="Durée" value="{{old('duree',$phase->duree)}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Date de début</label>
                                    <input type="date" class="form-control" name="date_de_debut" placeholder="Date de début" value="{{old('date_de_debut',$phase->date_de_debut)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Date de fin</label>
                                    <input type="date" class="form-control" name="date_de_fin" placeholder="Date de fin" value="{{old('date_de_fin',$phase->date_de_fin)}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Statut</label>
                                    <select name="statut" class="form-control">
                                        <option value="annulé" {{ $phase->statut == "annulé" ? 'selected' : '' }}>
                                            Annulé
                                        </option>
                                        <option value="en cours" {{ $phase->statut == "en cours" ? 'selected' : '' }}>
                                            En cours
                                        </option>
                                        <option value="complété" {{ $phase->statut == "complété" ? 'selected' : '' }}>
                                            Complété
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Respensable de la phase</label>
                                    <select name="matriculation" class="form-control">
                                        @foreach($employes as $employe)
                                        <option value="{{ $employe->matriculation }}" {{ $employe->matriculation == $phase->matriculation ? 'selected' : '' }}>
                                            {{ $employe->nom }} {{ $employe->prenom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </di>

    @endsection
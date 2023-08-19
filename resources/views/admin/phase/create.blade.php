@extends('adminlte::page')
@section('title')
Ajouter Nouveau Phase | Application de gestion des projets
@endsection

@section('content')
<div class="container">
   @include('layouts.alert')
   <div class="row ">
      <div class="col-md-10">
         <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                  <h4>Ajouter Nouvelle Phase</h4>
               </div>
            </div>
            <div class="card-body">
               <form action="{{route('phase.store')}}" method="POST" class="mt-3" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group mb-3">
                           <label for="registration_number">Réference du projet</label>
                           <select name="projet_id" class="form-control">
                              <option>Sélectionner Reference </option>
                              @foreach($projets as $projet)
                              <option value="{{ $projet->id }}">#{{ $projet->reference }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group mb-3">
                           <label for="registration_number">Nom de la phase</label>
                           <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{old('nom')}}">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group mb-3">
                           <label for="registration_number">Date de début</label>
                           <input type="date" class="form-control" name="date_de_debut" placeholder="Date de début" value="{{old('date_de_debut')}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Date de fin</label>
                           <input type="date" class="form-control" name="date_de_fin" placeholder="Date de fin" value="{{old('date_de_fin')}}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Durée</label>
                           <input type="number" class="form-control" name="duree" placeholder="Durée" value="{{old('duree')}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Statut</label>
                           <select name="statut" class="form-control">
                              <option value="en cours">En cours</option>
                              <option value="annulé">Annulé</option>
                              <option value="complété">Complété</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Respensable de la phase</label>
                           <select name="user_id" class="form-control">
                              <option>Sélectionner Un Employe </option>
                              @foreach($employes as $employe)
                              <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }} - {{ $employe->poste }}</option>
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
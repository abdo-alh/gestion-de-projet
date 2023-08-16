@extends('adminlte::page')
@section('title')
Modifier Projet | Application de gestion des projets
@endsection

@section('content')
<div class="container">
   @include('layouts.alert')
   <div class="row ">
      <div class="col-md-12">
         <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                  <h4>Modifier Projet</h4>
               </div>
            </div>
            <div class="card-body">
               <form action="{{route('projet.update',$projet->reference)}}" method="POST" class="mt-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group mb-3">
                           <label for="registration_number">Reference</label>
                           <input type="text" class="form-control" name="reference" placeholder="Reference" value="{{old('reference',$projet->reference)}}">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group mb-3">
                           <label for="registration_number">Titre</label>
                           <input type="text" class="form-control" name="titre" placeholder="titre" value="{{old('titre',$projet->titre)}}">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group mb-3">
                           <label for="registration_number">Budget</label>
                           <input type="text" class="form-control" name="budget" placeholder="Budget" value="{{old('budget',$projet->budget)}}">
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Période Estimée</label>
                           <input type="text" class="form-control" name="periodeestimeee" placeholder="Période Estimée" value="{{old('periodeestimeee',$projet->periodeestimeee)}}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Date de début</label>
                           <input type="date" class="form-control" name="datedebut" placeholder="Date de début" value="{{old('datedebut',$projet->datedebut)}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="registration_number">Date de fin</label>
                           <input type="date" class="form-control" name="datefin" placeholder="Date de fin" value="{{old('datefin',$projet->datefin)}}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="registration_number">Chef de Projet</label>
                        <select name="matriculation" class="form-control">
                           @foreach($employes as $employe)
                           <option value="{{ $employe->matriculation }}" {{ $employe->matriculation == $projet->matriculation ? 'selected' : '' }}>
                              {{ $employe->nom }} {{ $employe->prenom }}
                           </option>
                           @endforeach
                        </select>
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
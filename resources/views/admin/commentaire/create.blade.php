@extends('adminlte::page')
@section('title')
Ajouter Nouveau Commentaire | Application de gestion des projets
@endsection

@section('content')
<div class="container">
   @include('layouts.alert')
   <div class="row ">
      <div class="col-md-8 mx-auto">
         <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                  <h4>Ajouter Nouveau Commentaire</h4>
               </div>
            </div>
            <div class="card-body">
               <form action="{{route('commentaire.store')}}" method="POST" class="mt-3" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-3">
                     <label for="registration_number">Description</label>
                     <textarea class="form-control" name="description">{{old('description')}}</textarea>
                  </div>
                  <div class="form-group mb-3">
                     <label for="registration_number">Date de publication</label>
                     <input type="datetime-local" class="form-control" name="date_de_publication" placeholder="Date de publication" value="{{old('date_de_publication')}}">
                  </div>
                  <div class="form-group mb-3">
                     <label for="registration_number">Nom</label>
                     <input type="text" class="form-control" value="{{ auth()->user()->nom }} {{ auth()->user()->prenom }}" readonly>
                     <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                  </div>
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
@extends('adminlte::page')
@section('title')
Modifier Commentaire | Application de gestion des projets
@endsection

@section('content')
<div class="container">
   @include('layouts.alert')
   <div class="row ">
      <div class="col-md-8 mx-auto">
         <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                  <h4>Modifier Commentaire</h4>
               </div>
            </div>
            <div class="card-body">
               <form action="{{route('commentaire.update',$commentaire->id)}}" method="POST" class="mt-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                     <label for="registration_number">Description</label>
                     <textarea class="form-control" name="description">
                     {{ $commentaire->description }}
                     </textarea>
                  </div>
                  <div class="form-group mb-3">
                     <label for="registration_number">Date de publication</label>
                     <input type="datetime-local" class="form-control" name="date_de_publication" placeholder="Date de publication" value="{{old('date_de_publication',$commentaire->date_de_publication)}}">
                  </div>
                  <div class="form-group mb-3">
                     <label for="registration_number">Nom</label>
                     <select name="user_id" class="form-control">
                        @foreach($employes as $employe)
                        <option value="{{ $employe->id }}" {{ $employe->id == $commentaire->user_id ? 'selected' : '' }}>
                           {{ $employe->nom }} {{ $employe->prenom }}
                        </option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                        Enregistrer
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
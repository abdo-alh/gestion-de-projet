@extends('adminlte::page')
@section('title')
Add New Utilisateur | Laravel Clients App
@endsection

@section('content_header')
   <h1>Add New Utilisateur</h1>
@endsection

@section('content')
<div class="container">
   @include('layouts.alert')
    <div class="row ">
        <div class="col-md-8 mx-auto">
          <div class="card my-5">
            <div class="card-header">
                <div class="text-center fontèweight-bold text-uppercase">
                    <h4>Add New Utilisateur</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('employe.storeEmploye')}}" method="POST" class="mt-3" enctype="multipart/form-data">
                   @csrf
                   <div class="form-group mb-3">
                      <label for="registration_number">Matriculation</label>
                      <input type="text" maxlength="8" class="form-control"
                           name="matriculation" placeholder="Matriculationr" value="{{old('matriculation')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="registration_number">Nom</label>
                      <input type="text" class="form-control"
                           name="nom" placeholder="Nom" value="{{old('nom')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="registration_number">Prenom</label>
                      <input type="text"  class="form-control"
                           name="prenom" placeholder="Prenom" value="{{old('prenom')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="registration_number">Poste</label>
                      <input type="text" class="form-control"
                           name="poste" placeholder="Poste" value="{{old('poste')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="registration_number">Profession</label>
                      <select name="profession" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="utulisateur">Utulisateur</option>
                      </select>
                   </div>
                   <div class="form-group mb-3">
                      <label for="registration_number">cin</label>
                      <input type="text"  class="form-control"
                           name="cin" placeholder="cin" value="{{old('cin')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="name">telephone</label>
                      <input type="text" class="form-control"
                           name="telephone" placeholder="telephone" value="{{old('telephone')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="address">Email</label>
                      <input type="email" class="form-control"
                           name="email" placeholder="Email" value="{{old('email')}}">
                   </div>
                   <div class="form-group mb-3">
                      <label for="phone">Password</label>
                      <input type="password" class="form-control"
                           name="password" placeholder="Password" value="{{old('password')}}">
                   </div>
                   <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                        Submit
                     </button>
                   </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</di>

@endsection

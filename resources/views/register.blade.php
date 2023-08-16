@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Matriculation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('matriculation') is-invalid @enderror"
                                    id="matriculation" name="matriculation" value="{{ old('matriculation') }}">
                                @if ($errors->has('matriculation'))
                                    <span class="text-danger">{{ $errors->first('matriculation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nom" class="col-md-4 col-form-label text-md-end text-start">Nom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"
                                    name="nom" value="{{ old('nom') }}">
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end text-start">Prenom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror"
                                    id="prenom" name="prenom" value="{{ old('prenom') }}">
                                @if ($errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="poste" class="col-md-4 col-form-label text-md-end text-start">Poste</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('poste') is-invalid @enderror"
                                    id="poste" name="poste" value="{{ old('poste') }}">
                                @if ($errors->has('poste'))
                                    <span class="text-danger">{{ $errors->first('poste') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="profession"
                                class="col-md-4 col-form-label text-md-end text-start">Profession</label>
                            <div class="col-md-6">
                                <select name="profession" class="form-control @error('profession') is-invalid @enderror"
                                    id="profession" name="profession" value="{{ old('profession') }}">
                                    <option value="admin">Admin</option>
                                    <option value="utilisateur">Utilisateur</option>
                                    @if ($errors->has('profession'))
                                        <span class="text-danger">{{ $errors->first('profession') }}</span>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cin" class="col-md-4 col-form-label text-md-end text-start">CIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('cin') is-invalid @enderror" id="cin"
                                    name="cin" value="{{ old('cin') }}">
                                @if ($errors->has('cin'))
                                    <span class="text-danger">{{ $errors->first('cin') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end text-start">Telephone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone" value="{{ old('telephone') }}">
                                @if ($errors->has('telephone'))
                                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email
                                Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
Liste des Phases | Application du Gestion de Projet
@endsection

@section('content_header')
<h1>Liste des Phases</h1>
@endsection

@section('content')
<div class="container">
  <div class="row ">
    <div class="col-md-10 mx-auto">
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
                <th>Nom et Prenom</th>
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
  </di>

  @endsection

  @section('js')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
        ]
      });
    });

    function deleteEmp(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(id).submit();
        }
      });
    }
  </script>
  @if(session()->has('success'))
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: "{{session()->get('success')}}",
      showConfirmButton: false,
      timer: 2500
    });
  </script>
  @endif
  @endsection
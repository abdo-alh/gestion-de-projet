@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
Liste des Employes | Laravel Employes App
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card my-5">
        <div class="card-header">
          <div class="text-center fontèweight-bold text-uppercase">
            <h4>Liste des Employés</h4>
          </div>
        </div>
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-stripped">
            <thead>
              <tr>
                <th>Matriculation</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Cin</th>
                <th>Telephone</th>
                <th>Profession</th>
                <th>Poste</th>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->matriculation}}</td>
                <td>{{$user->nom}}</td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->cin}}</td>
                <td>{{$user->telephone}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->poste}}</td>
                <td>
                  <a href="{{route('employe.edit',$user->matriculation)}}" class="btn btn-sm btn-warning mx-1">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form id="{{$user->matriculation}}" action="{{route('employe.destroy',$user->matriculation)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onClick="return confirm('Voulez-vous vraiment supprimer cet employé ?')" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
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
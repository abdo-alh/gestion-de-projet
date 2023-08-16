@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
Liste des Projets | Application du Gestion de Projet
@endsection

@section('content')
<div class="container">
  <div class="row ">
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
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              @foreach($projets as $projet)
              <tr>
                <td>{{$projet->reference}}</td>
                <td>{{$projet->titre}}</td>
                <td>{{$projet->budget}}</td>
                <td>{{$projet->periodeestimeee}}</td>
                <td>{{$projet->datedebut}}</td>
                <td>{{$projet->datefin}}</td>
                <td>{{$projet->matriculation}}</td>
                <td>
                  <a href="{{route('projet.edit',$projet->reference)}}" class="btn btn-sm btn-warning mx-2">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form id="{{$projet->reference}}" action="{{route('projet.destroy',$projet->reference)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onClick="return confirm('Voulez-vous vraiment supprimer cette projet ?')" class="btn btn-sm btn-danger">
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
</div>

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
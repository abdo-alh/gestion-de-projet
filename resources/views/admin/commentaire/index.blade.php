@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
Liste des Commentaires | Application du Gestion de Projet
@endsection

@section('content')
<div class="container">
  <div class="row ">
    <div class="col-md-10 mx-auto">
      <div class="card my-5">
        <div class="card-header">
          <div class="text-center fontèweight-bold text-uppercase">
            <h4>Liste des Commentaires</h4>
          </div>
        </div>
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-stripped">
            <thead>
              <tr>
                <th>Description</th>
                <th>Date de publication</th>
                <th>Nom</th>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              @foreach($commentaires as $commentaire)
              <tr>
                <td>{{$commentaire->description}}</td>
                <td>{{$commentaire->date_de_publication}}</td>
                <td>{{$commentaire->employe->nom}} {{$commentaire->employe->prenom}}</td>
                <td>
                  <a href="{{route('commentaire.edit',$commentaire->id)}}" class="btn btn-sm btn-warning mx-2">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form id="{{$commentaire->id}}" action="{{route('commentaire.destroy',$commentaire->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onClick="return confirm('Voulez-vous vraiment supprimer cette commentaire ?')" class="btn btn-sm btn-danger">
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
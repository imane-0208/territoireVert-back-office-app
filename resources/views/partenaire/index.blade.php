@extends('layouts.app')



@section('content')

<div class="container">
    <div id="dash"></div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                
                <div class="card-header"><h1>partenaire</h1></div>

                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Ajouter partenaire
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Partenaires</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('addPartenaire')}}" method="POST" enctype="multipart/form-data">
                                
                                <div class="modal-body">
                                    {!! csrf_field() !!}
                                    <div class="mb-3">
                                        <label for="nompartenaire" class="form-label">Nom partenaire</label>
                                        <input type="text" class="form-control" id="nompartenaire" name="nom">
                                      </div>
                                      <div class="mb-3">
                                          <label for="nompartenaire" class="form-label">Email</label>
                                          <input type="email" class="form-control" id="nompartenaire" name="email">
                                      </div>
                                      <div class="mb-3">
                                          <label for="nompartenaire" class="form-label">Tele</label>
                                          <input type="text" class="form-control" id="nompartenaire" name="tele">
                                      </div>
                                      <div class="mb-3">
                                          <label for="nompartenaire" class="form-label">Site Web</label>
                                          <input type="text" class="form-control" id="nompartenaire" name="site">
                                      </div>
                                      <div class="mb-3">
                                          <label for="nompartenaire" class="form-label">Description</label>
                                          <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                                      </div>
                                      <div class="mb-3">
                                          <label for="nompartenaire" class="form-label">Image</label>
                                          <input class="form-control" type="file" id="formFile" name="img_path">
                                      </div>
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                    </div>
                                    
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="dtBasicExample" class="table table-sm" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tele</th>
                                <th scope="col">Site Web</th>
                                <th scope="col">photos</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Region</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $partenaires as $partenaire)
                                    
                                <tr>
                                  <th scope="row">{{ $partenaire->id }}</th>
                                  <td>{{ $partenaire->nom }}</td>
                                  <td>{{ $partenaire->email }}</td>
                                  <td>{{ $partenaire->tele }}</td>
                                  <td>{{ $partenaire->site }}</td>
                                  <td>
                                    <img src="{{ asset($partenaire->img_path) }}" alt="" width="100" class="img img-responsive">
                                  </td>
                                  <td><a class="btn btn-warning" href="{{ route('partenaire.categories' , $partenaire->id )}}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                  </svg></a></td>
                                  <td><a class="btn btn-info" href="{{ route('partenaire.regions' , $partenaire->id )}}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                  </svg></a></td>
                                  {{-- <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                        </div>
                                 </td> --}}
                                  <td class="d-flex justify-content-between">
                                      <div class="d-flex">
                                        <a class="btn btn-success me-1" href="{{ route('partenaire.edit' , $partenaire->id )}}" role="button" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a>
                                            <form class="" action="{{ route('deletePartenaire' , $partenaire->id)}}" method="POST">
                                                {{-- <a class="btn btn-success" href="{{ route('partenaire.edit' , $partenaire->id )}}" role="button" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a> --}}
                                                {!! csrf_field() !!}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger show_confirm"  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                                                </button>
                                            </form>


                                      </div>
                                      {{-- delete modal --}}
                                        {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('deletePartenaire')}}" method="POST">
                                                        
                                                        <div class="modal-body">
                                                            {!! csrf_field() !!}
                                                            <h5 class="modal-title" id="exampleModalLabel">Vous etes sur ? </h5>
                                                            <div class="mb-3">
                                                                <input type="hidden" class="form-control" value="{{ $partenaire->id }}" id="nompartenaire" name="partenaireId">
                                                            </div>    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                  </td>
                                </tr>

                                


                                
                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Categorie</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url('partenaire')}}" method="POST">
                                            
                                            <div class="modal-body">
                                                {!! csrf_field() !!}
                                                <div class="mb-3">
                                                  <label for="nompartenaire" class="form-label">Nom partenaire</label>
                                                  <input type="text" class="form-control" id="nompartenaire" name="partenaireName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nompartenaire" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="nompartenaire" name="partenaireName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nompartenaire" class="form-label">Tele</label>
                                                    <input type="text" class="form-control" id="nompartenaire" name="partenaireName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nompartenaire" class="form-label">Site Web</label>
                                                    <input type="text" class="form-control" id="nompartenaire" name="partenaireName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nompartenaire" class="form-label">Description</label>
                                                    <input type="text" class="form-control" id="nompartenaire" name="partenaireName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nompartenaire" class="form-label">Image</label>
                                                    <input type="text" class="form-control" id="nompartenaire" name="partenaireName">
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>

                                @endforeach
                              
                              
                            </tbody>
                        </table>
                    </div>
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
    
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<div class="container">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

      $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
        });
  
</script>
@endsection

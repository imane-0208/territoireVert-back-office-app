@extends('layouts.app')

@section('content')

<div class="container">
    <div id="dash"></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header"><h1>Categorie</h1></div>

                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Ajouter Categorie
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Categorie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('addcategory')}}" method="POST">
                                
                                <div class="modal-body">
                                    <div class="mb-3">
                                        {!! csrf_field() !!}
                                      <label for="nomCategorie" class="form-label">Nom categorie</label>
                                      <input type="text" class="form-control" id="nomCategorie" name="categoryName">
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
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $categories as $category)
                                    
                                <tr>
                                  <th scope="row">{{ $category->id }}</th>
                                  <td>{{ $category->categoryName }}</td>
                                  <td>
                                      <a class="btn btn-success" href="{{ url('categorie/' . $category->id )}}" role="button" data-bs-toggle="modal" data-bs-target="#editModal">Modifier</a>
                                      <a class="btn btn-danger" href="#" role="button">Supprimer</a>
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
                                        <form action="{{ url('categorie')}}" method="POST">
                                            
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    {!! csrf_field() !!}
                                                  <label for="nomCategorie" class="form-label">Nom categorie</label>
                                                  <input type="text" class="form-control" id="nomCategorie" name="categoryName">
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
@endsection

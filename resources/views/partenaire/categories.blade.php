@extends('layouts.app')

@section('content')

<div class="container">
    
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
                            <form action="{{ route('addCategoryToPartner')}}" method="POST">
                                
                                <div class="modal-body">
                                    <div class="mb-3">
                                        {!! csrf_field() !!}
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
                                            <option selected>Open this select menu</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                                
                                            @endforeach
                                        </select>
                                      
                                    </div>
                                    <input type="hidden" value="{{$partenaire->id}}" name="partenaire_id">
                                    
                                    
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
                                {{-- {{dd($partenaire)}} --}}
                                @foreach ( $partenaire->categories as $category)
                                    
                                <tr>
                                  <th scope="row">{{ $category->id }}</th>
                                  <td>{{ $category->categoryName }}</td>
                                  <td>
                                    <form class="" action="{{ route('deletePartenaireCategory')}}" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" class="form-control" value="{{ $partenaire->id }}" id="nompartenaire" name="partenaireId">
                                        <input type="hidden" class="form-control" value="{{ $category->id }}" id="nompartenaire" name="categoryId">
                                        <button class="btn btn-danger"  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg></button>
                                    </form>
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


@viteReactRefresh
@vite(['resources/css/app.css', 'resources/js/app.jsx'])
@extends('layouts.app')

@section('content')

<div class="container">
    <div id="dash"></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2> Modifier Partenaire</h2></div>
                
                <div class="card-body">
                    {{-- @foreach ( $partenaire as $partener) --}}
                    {{-- <h1>{{$partenaire->id}}</h1>
                    <h1>{{$partenaire->nom}}</h1>
                    <h1>{{$partenaire->email}}</h1> --}}
                    <form action="{{ route('partenaire.update')}}" method="POST">
                                            
                        <div class="form-container">
                            {!! csrf_field() !!}
                            <input type="hidden" value="{{ $partenaire->id}}" name="partenaireId"/>
                            <div class="mb-3">
                              <label for="nompartenaire" class="form-label">Nom partenaire</label>
                              <input type="text"  value="{{$partenaire->nom}}" class="form-control" id="nompartenaire" name="nom">
                            </div>
                            <div class="mb-3">
                                <label for="nompartenaire" class="form-label">Email</label>
                                <input type="email" value="{{$partenaire->email}}" class="form-control" id="nompartenaire" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="nompartenaire" class="form-label">Tele</label>
                                <input type="text" value="{{$partenaire->tele}}" class="form-control" id="nompartenaire" name="tele">
                            </div>
                            <div class="mb-3">
                                <label for="nompartenaire" class="form-label">Site Web</label>
                                <input type="text" value="{{$partenaire->site}}" class="form-control" id="nompartenaire" name="site">
                            </div>
                            <div class="mb-3">
                                <label for="nompartenaire" class="form-label">Description</label>
                                <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="description">{{$partenaire->description}}</textarea>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="nompartenaire" class="form-label">Image</label>
                                <input class="form-control" value="" type="file" id="formFile" name="img_path">
                            </div> --}}
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                            </div>
                            
                            
                        </div>
                        <br>
                        <div class="">
                            <button type="submit" class="btn btn-primary px-5 ">Modifier</button>
                        </div>
                        {{-- <a href="{{ route('partenaire')}}" type="submit" class="btn btn-secondary " data-bs-dismiss="modal">Annuler</a> --}}
                    </form>
    
    
                        
                    {{-- @endforeach --}}
                    

                    
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection


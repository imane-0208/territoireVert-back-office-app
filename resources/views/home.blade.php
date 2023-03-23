
{{-- @viteReactRefresh
@vite(['resources/css/app.css', 'resources/js/app.jsx']) --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/home.css')}}">

@section('content')

<div class="cards row">
    @foreach ( $partenaires as $partenaire)
    <article class="information col-md-4 [ card ]">
		<h3> {{$partenaire->nom}}</h3>
		<h4 >Categories : 
            @foreach ( $partenaire->categories as $category )
            <span>{{$category->categoryName . ''}}</span>
            @endforeach
        </h4> 
		<h4 >Regions : 
            @foreach ( $partenaire->regions as $region )
            <span>{{$region->regionName . ','}}</span>
            @endforeach
        </h4> 
		<p class="info">{{$partenaire->description}}</p>
        <form action="{{ route('confirm')}}" method="POST">
            {!! csrf_field() !!}

            <input type="hidden" name="partenaireId" value="{{ $partenaire->id }}" />
            <input type="hidden" name="confirmed" value= "1" />

            <button type="submit" class="btn btn-success">
                <span>Approver</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="none">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4v3z" fill="currentColor" />
                </svg>
            </button>
        </form>
	</article>

    @endforeach
    {{-- <div class="card col-md-3">
        <div class="table table-danger">
            <h5 class="category-social">
                news
                <i class="fa fa-newspaper-o"></i> News
            </h5>
            <h4 class="card-caption">
                <a href="#">"Consectetur odio feugiat"</a>
            </h4>
            <p class="card-description"> Lorem ipsum dolor sit amet, consectetur adipis cingelit. Etiam lacinia elit et placerat finibus.</p>
            <div class="ftr text-center"> <a href="#" class="btn btn-white btn-round">Read More</a> </div>
        </div>
    </div> --}}
    
</div>
@endsection


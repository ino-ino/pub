
@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

@if (session('massage'))
    {{ session('message') }}
@endif


    
  <div class="card-img-overlay">
    <img src="/images/oimonoomoi-2.png" class="card-img" alt="...">
  </div>


 <div class="card">
        <div class="card-body show">
            <h5 class="card-title">{{ $beer->name }}</h5>
            <p class="card-text">{{ $beer->memo }}</p>
            <p class="card-text">{{ $beer->manufacturer }}</p>
            <!--<p class="card-text">{{ $beer->image_url }}</p>-->
    
            <p class="card-text">キレ @foreach ( range(1,$beer->sharpness) as $number ) ★ @endforeach </p>
            <p class="card-text">コク @foreach ( range(1,$beer->body) as $number ) ★ @endforeach </p>
            <p class="card-text">香り @foreach ( range(1,$beer->aroma) as $number ) ★ @endforeach </p>
            <p class="card-text">味わい @foreach ( range(1,$beer->flavor) as $number ) ★ @endforeach </p>
            <p class="card-text">のどごし @foreach ( range(1,$beer->throat) as $number ) ★ @endforeach </p>
   
           <a href="/beers" class="btn">Back</a>
        </div>

　</div>



@endsection
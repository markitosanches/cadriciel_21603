@extends('layouts.app')
@section('content')

@php $locale = session()->get('locale'); @endphp
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">@lang('lang.text_hello') {{ $name }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        @guest  
            <a class="nav-link" href="{{route('user.registration')}}">Registration</a>
            <a class="nav-link" href="{{route('login')}}">Login</a>
        @else
            <a class="nav-link" href="{{route('blog.index')}}">Blogs</a>
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
        @endguest
            <a class="nav-link @if($locale=='en') bg-secondary @endif" href="{{route('lang', 'en')}}">En <i class="flag flag-united-states"></i></a>    
            <a class="nav-link @if($locale=='fr') bg-secondary @endif" href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a> 
            
      </div>
    </div>
  </div>
</nav>

@endsection
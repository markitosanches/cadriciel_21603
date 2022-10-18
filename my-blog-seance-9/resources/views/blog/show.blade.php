@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('blog.index')}}" class="btn btn-outline-primary btn-sm">Retourner</a>
                <h4 class="display-one mt-5">
                 {{ $blogPost->title }}
                </h4>
                <hr>
                <p>{!! $blogPost->body !!}</p>
                <hr> 
                <p>{{ $blogPost->blogHasUser->name}}</p>
                <p>{{ $blogPost->blogHasCategorie->name}}</p>              
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{route('blog.edit', $blogPost->id)}}" class="btn btn-primary">Mettre a jour</a>
            </div>
            <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Effacer
            </button>       
            </div>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('blog.edit', $blogPost->id )}}" method="post">
                @method('DELETE')
                @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Etes-vous certain d'effacer l'article: <p>{{ $blogPost->title }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Effacer</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection
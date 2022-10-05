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
            </div>
        </div>
    </div>
@endsection
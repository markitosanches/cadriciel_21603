@extends('layouts.app')
@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">
                            New password
                        </h3>
                        <div class="card-body">
                        @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        @endif
                        @if($errors)
                            <ul>
                              @foreach($errors->all() as $error)
                                <li class='text-danger'>{{ $error }}</li>
                              @endforeach
                            </ul>                     
                        @endif

                            <form method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="confirm password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="save" class="btn btn-dark btn-block">
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>User {{ $user->name }}: Edit</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.index') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $user->name }}
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')
                
                <form 
                    method="post"
                    action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('put')

                    @include('user.user.partials.form')

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
@endsection

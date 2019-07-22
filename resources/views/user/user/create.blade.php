@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>User: Create</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.index') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')
                
                <form 
                    method="post"
                    action="{{ route('user.store') }}">
                    @csrf

                    @include('user.user.partials.form')

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="text"
                            id="password"
                            class="form-control"
                            placeholder="123456789"
                            name="password"
                            value="{{ old('password') }}"
                            required />
                    </div>

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
@endsection

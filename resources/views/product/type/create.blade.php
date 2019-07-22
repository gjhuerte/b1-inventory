@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Products: Create</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('products.type.index') }}">Products</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')
                
                <form 
                    method="post"
                    action="{{ route('products.type.store') }}">
                    @csrf

                    @include('product.type.partials.form')

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

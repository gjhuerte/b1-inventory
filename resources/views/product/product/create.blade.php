@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Products <span class="badge badge-info">{{ $type->name }}</span>: Add</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('products.product.index', $type->id) }}">Products</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $type->name }}
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')
                
                <form 
                    method="post"
                    action="{{ route('products.product.store', $type->id) }}">
                    @csrf

                    @include('product.product.partials.form')

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

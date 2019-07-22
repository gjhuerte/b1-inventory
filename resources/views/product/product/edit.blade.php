@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Products {{ $type->name }}: Edit</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('products.product.index', $type->id) }}">Products</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $type->name }}
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit
                        </li>
                    </ol>
                </nav>
                
                <form 
                    method="post"
                    action="{{ route('products.product.update', ['type' => $type->id, 'product' => $product->id]) }}">
                    @csrf
                    @method('put')

                    @include('product.product.partials.form')

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

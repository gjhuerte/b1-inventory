@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Products <span class="badge badge-info">{{ $type->name }}</span></h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('products.type.index') }}">Products</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $type->name }}
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')

                <div class="float-right">
                    <a
                        href="{{ route('products.product.create', $type->id) }}"
                        class="btn btn-primary">
                        Add
                    </a>
                </div>

                <div class="clearfix"></div>

                <table
                    id="products-table"
                    class="table table-bordered mt-2">
                    <thead>
                        <th>Code</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>
                                    <a
                                        href="{{ route('products.product.edit', ['type' => $type->id, 'product' => $product->id]) }}"
                                        class="btn btn-warning">
                                        Edit
                                    </a>
                                    <button
                                        data-url="{{ route('products.product.destroy', ['type' => $type->id, 'product' => $product->id]) }}"
                                        class="btn btn-danger remove-button" 
                                        type="button">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td 
                                    colspan=2
                                    class="text-muted text-center">
                                    No records found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form 
        method="post" 
        id="remove-product-form">
        @csrf 
        @method('delete')
        
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#products-table').on('click', '.remove-button',  function () {
                console.log($(this).data('url'));
                $('#remove-product-form').attr('action', $(this).data('url'));
                $('#remove-product-form').submit();
            })
        });
    </script>
@endsection

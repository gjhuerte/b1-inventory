@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Products</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            Products
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')

                <div class="float-right">
                    <a
                        href="{{ route('products.type.create') }}"
                        class="btn btn-primary">
                        Create
                    </a>
                </div>

                <div class="clearfix"></div>

                <table
                    id="products-table"
                    class="table table-bordered mt-2">
                    <thead>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->getCountAttribute() }}</td>
                                <td>
                                    <a
                                        href="{{ route('products.product.index', $product->id) }}"
                                        class="btn btn-info text-light">
                                        Show
                                    </a>
                                    <a
                                        href="{{ route('products.type.edit', $product->id) }}"
                                        class="btn btn-warning">
                                        Edit
                                    </a>
                                    <button
                                        data-url="{{ route('products.type.destroy', $product->id) }}"
                                        class="btn btn-danger remove-button" 
                                        type="button">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td 
                                    colspan=4
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

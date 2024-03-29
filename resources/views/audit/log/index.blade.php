@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Audit</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('products.type.index') }}">Audit</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Logs
                        </li>
                    </ol>
                </nav>

                <table
                    id="products-table"
                    class="table table-bordered mt-2">
                    <thead>
                        <th>Information</th>
                        <th>User</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>{{ $log->info }}</td>
                                <td>{{ $log->name }}</td>
                                <td>{{ optional($log->created_at)->format('M d, Y h:m i') }}</td>
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
                
                {{ $logs->links() }}
            </div>
        </div>
    </div>
@endsection

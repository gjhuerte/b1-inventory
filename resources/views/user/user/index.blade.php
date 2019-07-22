@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>Users</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            Users
                        </li>
                    </ol>
                </nav>

                @include('layouts.notification')

                <div class="float-right">
                    <a
                        href="{{ route('user.create') }}"
                        class="btn btn-primary">
                        Create
                    </a>
                </div>

                <div class="clearfix"></div>

                <table
                    id="users-table"
                    class="table table-bordered mt-2">
                    <thead>
                        <th>Full Name</th>
                        <th>E-Mail</th>
                        <th>Type</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    <a
                                        href="{{ route('user.edit', $user->id) }}"
                                        class="btn btn-warning">
                                        Edit
                                    </a>
                                    <button
                                        data-url="{{ route('user.destroy', $user->id) }}"
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

                {{ $users->links() }}
            </div>
        </div>
    </div>

    <form 
        method="post" 
        id="remove-user-form">
        @csrf 
        @method('delete')
        
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#users-table').on('click', '.remove-button',  function () {
                console.log($(this).data('url'));
                $('#remove-user-form').attr('action', $(this).data('url'));
                $('#remove-user-form').submit();
            })
        });
    </script>
@endsection

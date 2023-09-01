@extends('layouts.default')
@section('content')
        <h2>Users Table</h2>
        <h6><a href="{{route('home')}}" class="underline text-gray-900 dark:text-white">Home</a></h6>
        <table class="table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @if ($users)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    @endforeach
                @endif

            </tbody>

        </table>
        {!! $users->links() !!}
@endsection

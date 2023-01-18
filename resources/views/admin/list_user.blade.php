@extends('index')
@section('main')
    <div class="container" style="margin-top: 30px">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Birth day</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td><img src="{{ $user->avatar }} "
                             class="rounded-circle"
                             height="60"
                             loading="lazy"/>
                    </td>
                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                    <td>{{ $user->birth_day }}</td>
                    @if($user->gender == '1')
                        <td>Male</td>
                    @elseif($user->gender == '2')
                        <td>Female</td>
                    @else
                        <td>Other</td>
                    @endif
                    <td>{{ $user->address }}</td>
                    <td>
                        <a href="{{ route('update.user.form', ['id'=>$user->user_id]) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Update</a>
                        <a href="{{ route('delete.user', ['id'=>$user->user_id]) }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('add.user.form') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">New User</a>
    </div>
@endsection

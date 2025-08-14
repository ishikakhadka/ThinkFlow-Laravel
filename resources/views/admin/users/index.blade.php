@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">

            @include('shared.success-message')
            {{-- @include('shared.error-message') --}}

            <div class="card overflow-hidden">
                @include('admin.shared.side-bar')
            </div>

        </div>
        <div class="col-9">
            <h1>Users </h1>


         <table class="table table-striped table-hover table-bordered align-middle text-center rounded">


                <thead class="table-dark">
                    <th>ID</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined At</th>
                    <th>Followers Count</th>
                    <th>
                       Access Rights
                    </th>
                </thead>
                <tbody>
                    @foreach ($users as $user)


                    <tr>
                        <td>{{$user->id}}</td>
                        <td> <img style="width:50px; height:50px; object-fit:cover;" class="me-3 avatar-sm rounded-circle"
                       src="{{ $user->getImageUrl() }}" alt="{{$user->name}}">
                   </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->toDateString()}}</td>
                        <td> <span class="fas fa-user me-1" ></span>{{$user->followers->count()}}</td>
                        <td> <a href="{{route('users.show',$user)}}" class="btn btn-sm btn-success">View</a>
                         <a href="{{route('users.edit',$user)}}" class="btn btn-sm btn-warning">Edit</a>
                        </td>

                    </tr>
                     @endforeach
                </tbody>
            </table>
          <div>
            {{$users->links()}}
          </div>
        </div>
    @endsection

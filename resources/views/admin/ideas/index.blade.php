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
        <h1>Ideas</h1>

        <table class="table table-striped table-hover table-bordered align-middle text-center rounded">
            <thead class="table-dark">
                <tr>
                    <th>User ID</th>
                    <th>Profile Picture</th>
                    <th>User Name</th>
                    <th>Idea</th>
                    <th>Created At</th>
                    <th> Like Count</th>
                    <th> Comment Count</th>
                    <th>Access Rights</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ideas as $idea)
                    <tr>
                        <td>{{ $idea->user_id }}</td>
                        <td>
                            <img style="width:50px; height:50px; object-fit:cover;"
                                 class="me-3 avatar-sm rounded-circle"
                                 src="{{ $idea->user->getImageUrl() }}"
                                 alt="{{ $idea->user->name }}">
                        </td>
                        <td>{{ $idea->user->name }}</td>
                        <td> {{Str::limit($idea->content, 40)}}</td>
                        <td>{{ $idea->created_at->toDateString() }}</td>
                        <td><span class="fas fa-heart me-1 text-danger">
                    </span> {{ $idea->likes_count }}</td>
                     <td><span class="fas fa-comment me-1 text-success">
                    </span> {{ $idea->comments->count() }}</td>
                        <td>
                            <a href="{{ route('ideas.show', $idea) }}" class="btn btn-sm btn-success">View</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $ideas->links() }}
        </div>
    </div>
</div>
@endsection

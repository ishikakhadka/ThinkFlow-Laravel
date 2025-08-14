  <div class="card">
      <div class="px-3 pt-4 pb-2">
          <div class="d-flex align-items-center justify-content-between">

              <div class="d-flex align-items-center">

                  <img style="width:50px; height:50px; object-fit:cover;" class="me-2 avatar-sm rounded-circle"
                      src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name }}">
                  <div>

                      <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                              {{ $idea->user->name }}
                          </a></h5>
                  </div>

              </div>

              <div class="d-flex gap-2">
                  <form method="GET" action="{{ route('ideas.show', $idea->id) }}">
                      @csrf
                      <button class="btn btn-primary btn-sm">VIEW</button>
                  </form>
                 @auth()
                      {{-- @can('idea.edit', $idea) --}}
                      @can('update', $idea)
                          <form method="GET" action="{{ route('ideas.edit', $idea->id) }}">
                              @csrf
                              <button class="btn btn-success btn-sm">EDIT</button>
                          </form>

                      <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}"
                          onsubmit="return confirm('Are you sure?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm">X</button>
                      </form>
                      @endcan
                  @endauth
              </div>

          </div>
      </div>

      <div class="card-body">
          @if ($editing ?? false)
              <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                      <textarea name="content" class="form-control" id="content" rows="3">{{ old('content', $idea->content) }}</textarea>
                      @error('content')
                          <span class="fs-6 text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-dark">UPDATE</button>
              </form>
          @else
              <p class="fs-6 fw-light text-muted">{{ $idea->content }}</p>
          @endif


          <div class="d-flex justify-content-between">
              @include('ideas.shared.likes')
              <div>
                  <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                      {{ $idea->created_at->diffForHumans() }}
                  </span>
              </div>
          </div>
          @include('shared.comments-box')
      </div>
  </div>

<div class="card">
       <div class="px-3 pt-4 pb-2">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('put')
           <div class="d-flex align-items-center justify-content-between">
               <div class="d-flex align-items-center">
                  <img style="width:50px; height:50px; object-fit:cover;" class="me-3 avatar-sm rounded-circle"
                       src="{{ $user->getImageUrl() }}" alt="{{$user->name}}">
                   <div>
                       <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                       <span class="text-danger d-block fs-6 mt-2">{{ $message }}</span>
                   @enderror
           </div>
                   </div>
               </div>
               <div>
                   @auth
                       @if (Auth::id() === $user->id)
                           <a href="{{ route('users.show', $user->id) }}">VIEW</a>
                       @endif
                   @endauth
               </div>
           </div>
           <div class="mt-4">
               <label for="">Profile Picture:</label>
               <input name="image"class="form-control" type="file" >
                @error('image')
                       <span class="text-danger d-block fs-6 mt-2">{{ $message }}</span>
                   @enderror
           </div>
           <div class="px-2 mt-4">
               <h5 class="fs-5"> Bio : </h5>
               <div class="mb-3">
                  <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}} </textarea>
                   @error('bio')
                       <span class="text-danger d-block fs-6 mt-2">{{ $message }}</span>
                   @enderror
               </div>
               <button class="btn btn-secondary mb-3">Save</button>
                  <div class="d-flex justify-content-start mb-4">
                   <a href="#" class="fw-light nav-link fs-6 me-3 text-danger">
                       <span class="fas fa-user me-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                           title="Followers"></span>
                       {{ $user->followers()->count() }}
                   </a>

                   <a href="#" class="fw-light nav-link fs-6 me-3 text-success">
                       <span class="fas fa-user-friends me-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                           title="Followings"></span>
                       {{ $user->followings()->count() }}
                   </a>

                   <a href="#" class="fw-light nav-link fs-6 me-3 text-primary">
                       <span class="fas fa-brain me-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                           title="Ideas"></span>
                       {{ $user->ideas()->count() }}
                   </a>

                   <a href="#" class="fw-light nav-link fs-6 text-warning">
                       <span class="fas fa-comment me-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                           title="Comments"></span>
                       {{ $user->comments()->count() }}
                   </a>
               </div>
           </div>
           </form>
       </div>

   <hr>

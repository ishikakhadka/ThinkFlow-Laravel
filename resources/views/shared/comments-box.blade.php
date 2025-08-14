 <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
     @csrf
     <div>
         <div class="mb-3">
             <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
         </div>
         <div>
             <button class="btn btn-primary btn-sm"> Post a Comment </button>
         </div>
     </div>
 </form>
 @forelse($idea->comments as $comment)
     <hr>
     <div class="d-flex align-items-start">
         <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}"
             alt="">
         <div class="w-100">
           <div class="d-flex justify-content-between align-items-center">

    <div class="d-flex align-items-center">
        <h6 class="mb-0 me-2">{{ $comment->user->name }}</h6>
        <small class="fs-6 fw-light text-muted">
            {{ $comment->created_at->diffForHumans() }}
        </small>
    </div>


    @if ($comment->user_id == auth()->id()|| $idea->user_id==auth()->id())
        <div class="d-flex">
            {{-- <a href="{{ route('comments.edit', [$idea->id, $comment->id]) }}"
               class="btn btn-warning btn-sm me-1">
               Edit
            </a> --}}
            <form method="POST" action="{{ route('comments.destroy', [$idea->id, $comment->id]) }}"
                  onsubmit="return confirm('Are you sure?')" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">X</button>
            </form>
        </div>
    @endif
</div>


             <p class="fs-6 mt-3 fw-light ">
                 {{ $comment->content }}</p>


         </div>
     </div>
 @empty
     <hr>
     <p class="text-center">No comments found.</p>
 @endforelse

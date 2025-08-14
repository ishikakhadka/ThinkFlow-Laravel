 @auth
 <h4> Share yours ideas </h4>
 <form action="{{route('ideas.store')}}" method="POST">
    @csrf
                <div class="row">
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                    </div>
                    @error('content')
                    <span class="fs-6 text-danger">{{$message}}</span>
                    @enderror
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Share </button>
                    </div>
                    </form>
                </div>
@endauth

@guest
<h4 class="text-primary">{{__('ideas.login_to_share')}} </h4>
@endguest

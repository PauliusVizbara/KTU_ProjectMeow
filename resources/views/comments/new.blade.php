<form class="comment__form" method="post" action="{{route('comments.store') }}">
    <input type="hidden" name="author_id" value="{{Auth::user()->id}}" />
    <input type="hidden" name="animal_id" value="{{$animal->id}}" />
    @csrf
    <div class="form-group">
        <input style="width: 40%" type="text" name="text" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-secondary" value="Add Comment" />
    </div>
</form>

<div class="col-lg-3">
    @if(!(request()->query('category')) )
        <div class="list-group">
            <form method="GET" action="{{ action('HomeController@search') }}" class="list-group-item">
                <input type="hidden" name="search" value="{{ request()->query('search') }}">
                @foreach($filter as $slug => $name)
                <label><input type="checkbox" name="category" value="{{ $slug }}" onChange="this.form.submit()"> {{ $name }} </label> </br>
                 @endforeach
            </form>
        </div>
    @endif
</div>


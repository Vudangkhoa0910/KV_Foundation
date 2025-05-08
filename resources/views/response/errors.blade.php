{{--if errors occured, show this component--}}
@if($errors->any())
    @foreach($errors->all() as $error)
        <p class="error">{{$error}}</p>
    @endforeach
@endif

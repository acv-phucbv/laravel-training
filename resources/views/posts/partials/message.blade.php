@if(session()->has('message'))
    {{--<script>--}}
        {{--alert('{!! session()->get('message') !!}');--}}
    {{--</script>--}}
    <h1 class="alert alert-success">{!! session()->get('message') !!}</h1>
    <h3 class="alert alert-success">{!! session()->get('success') !!}</h3>
@endif
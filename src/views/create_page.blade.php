@extends(config('liquid.theme'))

@section(config('liquid.section'))

    Uh oh.  This route doesn't exist yet.  Do you want to create it?

@stop


@push('js_footer')

<script>
    function createPage()
    {
        $.ajax({
            url: "{{action('Salaback\LiquidCMS\Http\CMSController@postCreatePage')}}}",
            type: post,
            data: {
                _token: "{{csrf_token()}}",
                route: {{json_encode($route)}}
            }
        })
    }
</script>
@endpush


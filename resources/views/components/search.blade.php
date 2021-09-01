<x-jquery-modal></x-jquery-modal>
<div id="searchlist" class="pb-2 mb-2 border-b border-dashed border-gray-200"></div>
@section('botJquery')
<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ route("search.santri") }}',
            data: {
                'search': $value
            },
            success: function(data) {
                $('#searchlist').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
@endsection

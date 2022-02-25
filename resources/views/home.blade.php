@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Dicas sobre automóveis</h1>
    <div>
        <div class="row">
            <div class="d-none d-md-block col-0 col-md-3 mt-2">
                <h3>Filtro</h3>
                <form action="{{ route('search') }}" method="post" class="my-2">
                    @csrf
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="search[]" id="all" value="">
                            Todos
                        </label>
                    </div>
                    <p class="fw-bold pb-0 mb-0 pt-2">Por Categoria:</p>
                    @foreach ($categories as $category)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="search[]" id="{{ $category->id }}"
                                value="{{ $category->id }}">
                            {{ $category->type }}
                        </label>
                    </div>
                    @endforeach
                    <p class="fw-bold pb-0 mb-0 pt-2">Por Modelo:</p>
                    @foreach ($automobiles as $automobile)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="search[]" id="{{ $automobile->model }}"
                                value="{{ $automobile->model }}">
                            {{ $automobile->model }}
                        </label>
                    </div>
                    @endforeach
                    <p class="fw-bold pb-0 mb-0 pt-2">Por Marca:</p>
                    @foreach ($automobiles as $automobile)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="search[]" id="{{ $automobile->mark }}"
                                value="{{ $automobile->mark }}">
                            {{ $automobile->mark }}
                        </label>
                    </div>
                    @endforeach
                </form>
            </div>
            <div class="row col-12 col-md-9" id="search-results">
                @include('tips')
            </div>
        </div>

    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('input[name="search[]"]').on('change', function (e) {
            $value=$(this).val();
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type:'POST',
                url:"{{URL::to("/search")}}",
                dataType: 'html',
                data: {'search':$value},
                success: function(result) {
                    $('#search-results').html(result);
                }
            })
        });
    });
</script>
@endpush

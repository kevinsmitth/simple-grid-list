@foreach ($tips as $tip)
<div class="col-12 col-md-6 col-lg-4 my-2 my-lg-0">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title h5">Modelo: {{ $tip->automobiles[0]->model }}</h3>
            <span>Marca: {{ $tip->automobiles[0]->mark }}</span>
            @if (empty($tip->automobile[0]->version))
            <div>
                <span>Versão: {{ $tip->automobiles[0]->version }}</span>
            </div>
            @endif
            <p class="card-text pt-2">{{ $tip->text }}</p>
        </div>
    </div>
</div>
@endforeach

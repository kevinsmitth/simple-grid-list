@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center h3">Crie dicas sobre automóveis</h1>
    @if (session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger d-flex h-100">
        @foreach ($errors->all() as $error)
        <div class="justify-content-center align-self-center mx-auto">
            <p class="text-center mx-auto">{{ $error }}</p>
        </div>
        @endforeach
    </div>
    @endif
    <div>
        <form action="{{ route('admin.tips.store') }}" method="post">
            @csrf
            <div class="form-floating my-3">
                <select class="form-select" name="category" id="categoryId" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->type }}
                    </option>
                    @endforeach
                </select>
                <label for="categoryId">Escolha a Categoria <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating my-3">
                <select class="form-select" name="model" id="modelId" required>
                    @foreach ($automobiles as $automobile)
                    <option value="{{ $automobile->model }}">
                        {{ $automobile->model }}
                    </option>
                    @endforeach
                </select>
                <label for="modelId">Escolha o Modelo <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating my-3">
                <select class="form-select" name="model" id="markId" required>
                    @foreach ($automobiles as $automobile)
                    <option value="{{ $automobile->mark }}">
                        {{ $automobile->mark }}
                    </option>
                    @endforeach
                </select>
                <label for="markId">Escolha a Marca <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating my-3">
                <select class="form-select" name="model" id="versionId">
                    <option value="" checked>Nenhuma</option>
                    @foreach ($automobiles as $automobile)
                    @if (!empty($automobile->version))
                    <option value="{{ $automobile->version }}">
                        {{ $automobile->version }}
                    </option>
                    @endif
                    @endforeach
                </select>
                <label for="versionId">Escolha a Versão (Opcional)</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="text" id="tipsId" placeholder="Dica" style="height: 100px"
                    required></textarea>
                <label for="tipsId">Dica
                    <span class="text-danger">*</span>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success">Enviar</button>
            </div>
        </form>
    </div>
</div>
@endsection

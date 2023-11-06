@props(['entity'])
<div class="d-block d-lg-flex justify-content-lg-between">
    <button type="submit" class="btn btn-primary">
        @if ($entity->exists) Salvar alteração @else Cadastrar @endif
    </button>
    <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}">Voltar</a>
</div>
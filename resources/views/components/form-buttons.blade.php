@props(['entity'])
<div class="d-block d-lg-flex">
    <button type="submit" class="btn btn-primary mr-2">
        @if ($entity->exists) Salvar alteração @else Cadastrar @endif
    </button>
    <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}">Voltar</a>
</div>
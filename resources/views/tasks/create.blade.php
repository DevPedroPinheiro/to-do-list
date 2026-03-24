@extends('layouts.app')

@section('content')
<div class="card shadow-sm" style="max-width: 600px; margin: 0 auto;">
    <div class="card-body">
        <h2 class="card-title mb-4">Nova Tarefa</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Título *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" placeholder="Ex: Estudar Laravel">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                          rows="3" placeholder="Detalhes da tarefa...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Data de vencimento</label>
                <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror"
                       value="{{ old('due_date') }}">
                @error('due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>

        </form>
    </div>
</div>
@endsection
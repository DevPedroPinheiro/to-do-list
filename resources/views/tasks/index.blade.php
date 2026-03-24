@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Minhas Tarefas</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Nova Tarefa</a>
</div>

@if($tasks->isEmpty())
    <div class="alert alert-info">Nenhuma tarefa cadastrada ainda.</div>
@else
    <div class="list-group">
        @foreach($tasks as $task)
            <div class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    <span class="{{ $task->is_done ? 'text-decoration-line-through text-muted' : '' }}">
                        <strong>{{ $task->title }}</strong>
                    </span>

                    @if($task->description)
                        <p class="mb-0 text-muted small">{{ $task->description }}</p>
                    @endif

                    @if($task->due_date)
                        <small class="text-muted">📅 {{ $task->due_date->format('d/m/Y') }}</small>
                    @endif
                </div>

                <div class="d-flex gap-2">

                    {{-- Toggle concluída --}}
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm {{ $task->is_done ? 'btn-warning' : 'btn-success' }}">
                            {{ $task->is_done ? '↩ Reabrir' : '✔ Concluir' }}
                        </button>
                    </form>

                    {{-- Editar --}}
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary">✏️ Editar</a>

                    {{-- Deletar --}}
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                          onsubmit="return confirm('Deseja deletar esta tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑 Deletar</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
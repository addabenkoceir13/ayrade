@extends('layouts.User.app-user')

@section('title', 'Task')

@section('content')
<section>
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Tasks /</span> Task
        </h4>
        <div class="card p-2">
        <h5 class="card-header">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createtask">
            {{ __('Add Task') }}
        </button>
        </h5>
        @include('content.User.Task.create')

            <div class="table-responsive text-nowrap">
                <table id="datatable-task" class="table table-hover is-stripedt">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >{{ __('Title') }}</th>
                            <th >{{ __('statut') }}</th>
                            <th >{{ __('date_start') }}</th>
                            <th >{{ __('date_end') }}</th>
                            <th >{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->titre }}</td>
                                <td>
                                    @switch($task->statut)
                                        @case('completed')
                                            <span class="badge bg-success me-1">{{ __('Completed') }}</span>
                                            @break
                                        @case('processing')
                                            <span class="badge bg-secondary me-1">{{ __('Processing') }}</span>
                                            @break
                                        @case('waiting')
                                            <span class="badge bg-warning me-1">{{ __('Waiting') }}</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>{{ $task->date_start }}</td>
                                <td>{{ $task->date_end }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTask{{ $task->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletedtask{{ $task->id }}">
                                    <i class="bi bi-trash"></i>
                                    </button>

                                </td>
                            </tr>
                            @include('content.User.Task.deleted')
                            @include('content.User.Task.edit')
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-script')
<script>
    new DataTable('#datatable-task', {
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;

                    // Create input element
                    let input = document.createElement('input');
                    input.placeholder = title;
                    column.footer().replaceChildren(input);

                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                });
            }
    });

</script>
@endsection

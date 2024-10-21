@extends('layouts.Dashboard.app')

@section('title', 'Users')

@section('content')
<section>
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Users /</span> Users
        </h4>
        <div class="card p-2">
          <h5 class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createuser">
              {{ __('Add User') }}
            </button>
          </h5>
          @include('content.Admin.User.create')

            <div class="table-responsive text-nowrap">
              <table id="datatable-user" class="table table-hover is-stripedt">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >{{ __('First Name') }}</th>
                        <th >{{ __('Last Name') }}</th>
                        <th >{{ __('Email') }}</th>
                        <th >{{ __('Phone') }}</th>
                        <th >{{ __('Status') }}</th>
                        <th >{{ __('Action') }}</th>
                    </tr>

                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->firstname }}</td>
                      <td>{{ $user->lastname }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>
                        @if ($user->status == 'active')
                          <span class="badge bg-success me-1">{{ __('active') }}</span>
                        @else
                          <span class="badge bg-warning me-1">{{ __('inactive') }}</span>
                        @endif
                      </td>
                      <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editdUser{{ $user->id }}">
                          <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletedUser{{ $user->id }}">
                          <i class="bi bi-trash"></i>
                        </button>

                      </td>
                    </tr>
                    @include('content.Admin.User.deleted')
                    @include('content.Admin.User.edit')
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
    new DataTable('#datatable-user', {
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

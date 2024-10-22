<!-- Modal -->
<div class="modal fade" id="createtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create TAsk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.tasks.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="d-flex justify-content-start mb-1" for="titre">Title</label>
                            <input type="text" name="titre" value="{{ old('titre') }}" id="titre" class="form-control @error('titre') is-invalid @enderror" placeholder="Enter Your Title" />
                            @error('titre')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select class="form-control @error('statut') is-invalid @enderror" name="statut"
                                value="{{ old('statut') }}">
                                <option value="waiting">Waiting</option>
                                <option value="processing">Processing</option>
                                <option value="completed">Completed</option>
                            </select>
                            @error('statut')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <!-- date_start input -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="date_start">Date Start</label>
                                <input type="date" name="date_start" value="{{ old('date_start') }}" id="date_start" class="form-control @error('date_start') is-invalid @enderror" />
                                @error('date_start')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="date_end">Date End</label>
                                <input type="date" name="date_end" value="{{ old('date_end') }}" id="date_end" class="form-control @error('date_end') is-invalid @enderror"/>
                                @error('date_end')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Password input -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="description">Description</label>
                                <textarea name="description" class="form-control" id="" placeholder="Enter your description">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="status">User</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                value="{{ old('user_id') }}">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

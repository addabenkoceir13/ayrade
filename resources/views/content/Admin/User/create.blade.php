<!-- Modal -->
<div class="modal fade" id="createuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="d-flex justify-content-start mb-1" for="firstname">First name</label>
                            <input type="text" name="firstname" value="{{ old('firstname') }}" id="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter Your First name" />
                            @error('firstname')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="lastname">Last name</label>
                                <input type="text" name="lastname" value="{{ old('lastname') }}" id="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter Your Last name"/>
                                @error('lastname')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="email">Email address</label>
                                <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email address"/>
                                @error('email')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="phone">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" class="form-control @error('phone') is-invalid @enderror" max="10" placeholder="Enter Your Phone"/>
                                @error('phone')
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
                                <label class="d-flex justify-content-start mb-1" for="password">Password</label>
                                <input type="password" name="password" value="" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password"/>
                                @error('password')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="password_confirmation">Password Confirmation</label>
                                <input type="password" name="password_confirmation" value="" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Your Password Confirmation"/>
                                @error('password_confirmation')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- status input -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status"
                                value="{{ old('status') }}">
                                <option value="active">Active
                                </option>
                                <option value="inactive">Inactive
                                </option>
                            </select>
                            @error('status')
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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard.users.index') }}">AYRADE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('task.task.index') }}">Task</a>
                </li>
            </ul>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" style="color: white" href="javascript:void(0);" data-bs-toggle="dropdown">
                    {{ auth()->user()->firstname .' '.  auth()->user()->lastname}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('img/1.png') }}" alt width="50" class="rounded-circle">
                            </div>
                            </div>
                            <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ auth()->user()->firstname }}</span>
                            <small class="text-muted">{{ __('Admin') }}</small>
                            </div>
                        </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">{{ __('My Profile') }}</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                        <i class='bx bx-power-off me-2'></i>
                        <span class="align-middle">{{ __('Log Out') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </div>
    </div>
</nav>

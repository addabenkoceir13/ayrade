<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users;

    /**
     * UserController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('role:admin');
        $this->users = $users;
    }

    public function index()
    {
        $users = $this->users->getUser();
        return view('content.Admin.User.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(CreateUserRequest $request)
    {
        $data = $request->all();

        $user = $this->users->create($data);

        if ($user) {
            toastr()->success('User created successfully');
            return redirect()->back();
        } else {
            toastr()->error('User creation failed');
            return redirect()->back();
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();

        $user = $this->users->update($id, $data);

        if ($user) {
            toastr()->success('User updated successfully ' . $user->firstname);
            return redirect()->back();
        } else {
            toastr()->error('User update failed');
            return redirect()->back();
        }

    }



    public function destroy($id)
    {
        $user = $this->users->delete($id);
        if ($user) {
            toastr()->success('User delete successfully');
            return redirect()->back();
        } else {
            toastr()->error(message: 'User delete failed');
            return redirect()->back();
        }
    }
}

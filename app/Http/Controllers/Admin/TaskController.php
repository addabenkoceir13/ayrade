<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTaskCreateRequest;
use App\Http\Requests\AdminTaskUpdateRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Task\TaskRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;
    private $user;

    public function __construct(TaskRepository $task, UserRepository $user)
    {
        $this->middleware('role:admin');
        $this->task = $task;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Tasks = $this->task->all();
        $users  = $this->user->getUser();
        return view('content.Admin.Task.index', compact('Tasks', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminTaskCreateRequest $request)
    {

        $data = $request->all();
        $task = $this->task->create($data);

        if ($task) {
            toastr()->success('Task created successfully');
            return redirect()->back();
        } else {
            toastr()->error('Failed to create task');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminTaskUpdateRequest $request, Task $task)
    {

        $this->authorize('update',  $task);

        $data = $request->all();

        $task = $this->task->update($task->id, $data);

        if ($task) {
            toastr()->success('Task updated successfully');
            return redirect()->back();
        } else {
            toastr()->error('Task update failed');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task = $this->task->delete($task->id);

        if ($task) {
            toastr()->success('Task deleted successfully');
            return redirect()->back();
        } else {
            toastr()->error('Task delete failed');
            return redirect()->back();
        }
    }
}

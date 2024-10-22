<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;

    public function __construct(TaskRepository $task)
    {
        $this->middleware('role:user');
        $this->task = $task;
    }

    public function index()
    {
        $Tasks = $this->task->getTaskByUser(auth()->user()->id);
        return view('content.User.Task.index', compact('Tasks'));
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

    public function store(TaskCreateRequest $request)
    {

        $data = $request->all() + [
            'user_id' => auth()->user()->id,
        ];

        $task = $this->task->create($data);
        if ($task) {
            toastr()->success('Task created successfully');
            return redirect()->back();
        } else {
            toastr()->error('Task creation failed');
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
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $this->authorize('update',  $task);

        $data = $request->all();
        // dd($data);
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
        $task = $this->task->delete( $task->id);

        if ($task) {
            toastr()->success('Task deleted successfully');
            return redirect()->back();
        } else {
            toastr()->error('Task delete failed');
            return redirect()->back();
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = TodoList::orderBy('status_id', 'asc')->get();
        return view('welcome', ['task' => $task]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'task' => 'required|string',
        ]);

        TodoList::create( [
            'task' => $request['task']
        ]);
        Alert::success('Success');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TodoList $id)
    {

        $checkStatus = TodoList::find($id)->first();
        if($checkStatus->status_id == 1) {
            $id->update([
                'status_id' => 2
            ]);
            Alert::success('Success');
        return redirect('/');
        } else if($checkStatus->status_id == 2){
            $id->update([
                'status_id' => 1
            ]);
            Alert::success('Success');
        return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoList $id)
    {
        $id->delete();
        Alert::success('Success');
        return redirect('/');
    }
}

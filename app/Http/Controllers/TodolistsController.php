<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todolist;

class TodolistsController extends Controller
{

	public function index(){
 
        $todolists = Todolist::all();
    	return view('todolist',compact('todolists'));
    }
	
    public function show($id)
    {
        //return view('user.profile', ['user' => User::findOrFail($id)]);
    }
	
	public function add()
    {
        return view('todolist');
    }
	
	public function edit($id)
    {
         return view('todolist', ['todolist_edit' => Todolist::findOrFail($id),'id'=>$id]);
    }
	
	public function store(Request $request,$id=null)
	{
		if(isset($id))
		{//edit
			$todolist = Todolist::findOrFail($id);
			$todolist->name = request('task-name');
			$todolist->save();

		}
		else
		{//add
			$todolist = new Todolist();
			$todolist->name = request('task-name');
			$todolist->save();
		}
		return redirect('/todolist/index');
		
	}
	
	public function delete($id)
    {
		if(isset($id))
		{
			$todolist = Todolist::findOrFail($id);
			$todolist->delete();
        }
		return redirect('/todolist/index');
    }
	
	public function complete($id)
	{
		if(isset($id))
		{
			$todolist = Todolist::findOrFail($id);
			if($todolist->completed==1)
			{
				$todolist->completed = 0;
			}
			else
			{
				$todolist->completed = 1;
			}
			$todolist->save();

		}
		return redirect('/todolist/index');
		
	}
	

}

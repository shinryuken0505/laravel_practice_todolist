<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo-List</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }

        table button {
            margin-left: 20px
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Task List
                </a>
            </div>
        </div>
    </nav>
        <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- New Task Form -->
					@if(isset($id))
						<form action="/todolist/store/{{$id}}" method="POST" class="form-horizontal">
					@else
						<form action="/todolist/store" method="POST" class="form-horizontal">
					@endif
					{{ csrf_field() }}
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
							<div class="col-sm-6">
							@if(isset($todolist_edit))
								 <input type="text" name="task-name" id="task-name" class="form-control" value="{{$todolist_edit->name}}">
							@else
								<input type="text" name="task-name" id="task-name" class="form-control" value="">
							@endif
                            
                             
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current Tasks -->
			@if(isset($todolists))
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
				
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
							
							@foreach ($todolists as $todolist)
							<tr>
                                <td class="col-sm-6">{{$todolist->name}}</td>
                             
                                <td class="col-sm-6">
										@if($todolist->completed==0)
                                        <a href='/todolist/complete/{{$todolist->id}}'><button type="submit" class="btn btn-primary"><i class="fa fa-btn"></i>Completed?</button></a>
										@else
											 <a href='/todolist/complete/{{$todolist->id}}'><button type="submit" class="btn btn-success"><i class="fa fa-btn  fa-thumbs-o-up"></i>Completed!</button></a>
										@endif
                                        <a href='/todolist/edit/{{$todolist->id}}'><button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-pencil"></i>edit</button></a>
                                        <button type="button" class="btn btn-danger" onclick="if(confirm('Delete it ?')){location.href='/todolist/delete/{{$todolist->id}}';}"><i class="fa fa-btn fa-trash"></i>delete</button>
                                </td>
                            </tr>
							@endforeach
							
                        </tbody>
                    </table>
				
                </div>
            </div>
			@endif	
        </div>
    </div>
</body>
</html>
@extends('admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Classes</div>
					
					 @if (session('message'))
						<div class="alert alert-info">{{ session('message') }}</div>
					@endif  

                    <div class="panel-body">
						
						<a href="{{ route('classes.create') }}" class="btn btn-default">Add New Class</a>
						<br/><br/>
						
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Section</th>
									<th>Class Teacher</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($classes as $classe)
                                <tr>
                                    <td>{{ $classe->name }} </td>
									<td>{{ $classe->section['name']}} </td>
									<td>{{ $classe->teacher['name']}} </td>
                                    <td>
                                        <a href="{{ route('classes.edit', $classe->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('classes.destroy', $classe->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No entries found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	
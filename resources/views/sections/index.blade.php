@extends('admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sections</div>
					
					 @if (session('message'))
						<div class="alert alert-info">{{ session('message') }}</div>
					@endif  

                    <div class="panel-body">
						
						<a href="{{ route('sections.create') }}" class="btn btn-default">Add New Section</a>
						<br/><br/>
						
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sections as $section)
                                <tr>
                                    <td>{{ $section->name }}</td>
                                    <td>
                                        <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST"
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
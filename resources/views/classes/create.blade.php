@extends('admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Class</div>

                    <div class="panel-body">
                        <form action="{{ route('classes.store') }}" method="post">
                            {{ csrf_field() }}
                            Class name:
                            <br />
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <br /><br />
							
							<select name="section" class="form-control">
								 <option>Select Section</option><!--selected by default-->
								 @foreach($sections as $section)
									 <option value="{{ $section->id }}">
										 {{ $section->name }}
									 </option>
								 @endforeach
							</select>
							<br/><br/>
							
							<select name="teacher" class="form-control">
								 <option>Select Class Teacher</option><!--selected by default-->
								 @foreach($teachers as $teacher)
									 <option value="{{ $teacher->id }}">
										 {{ $teacher->name }}
									 </option>
								 @endforeach
							</select>
							<br/><br/>
							
							<a href="{{ route('sections.create') }}" class="btn btn-default">Add New Section</a>
							<br/><br/>
                            
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
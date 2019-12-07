@extends('admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
					<div class="panel-heading">Edit Student</div>

						<div class="panel-body">
							@if ($errors->count() > 0)
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif
							<form action="{{ route('students.update', $student->id) }}" method="post">
								<input type="hidden" name="_method" value="PUT">
								{{ csrf_field() }}
								Student name:
								<br />
								<input type="text" name="name" value="{{ $student->name }}" />
								<br /><br />
								
								<select name="class_id" class="form-control">
								 <option>Select Class</option><!--selected by default-->
								 @foreach($classes as $classe)
									 <option value="{{ $classe->id }}">
										 {{ $classe->name }} {{ $classe->section->name}}
									 </option>
								 @endforeach
								</select>
							</br></br>
								
								<input type="submit" value="Submit" class="btn btn-default" />
							</form>
						</div>
					</div>
				</div>
			</div>
</div>			
@endsection	
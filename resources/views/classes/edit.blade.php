@extends('admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
					<div class="panel-heading">Edit Class</div>

						<div class="panel-body">
							@if ($errors->count() > 0)
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif
							<form action="{{ route('classes.update', $classe->id) }}" method="post">
								<input type="hidden" name="_method" value="PUT">
								{{ csrf_field() }}
								<input type="text" name="name" value="{{ $classe->name }}" />
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
							
								
								<input type="submit" value="Submit" class="btn btn-default" />
							</form>
						</div>
					</div>
				</div>
			</div>
</div>			
@endsection	
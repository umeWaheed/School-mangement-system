@extends('admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
					<div class="panel-heading">Edit Section</div>

						<div class="panel-body">
							@if ($errors->count() > 0)
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif
							<form action="{{ route('sections.update', $section->id) }}" method="post">
								<input type="hidden" name="_method" value="PUT">
								{{ csrf_field() }}
								Subject name:
								<br />
								<input type="text" name="name" value="{{ $section->name }}" />
								<br /><br />
								
								<input type="submit" value="Submit" class="btn btn-default" />
							</form>
						</div>
					</div>
				</div>
			</div>
</div>			
@endsection	
@extends('admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Subject</div>

                    <div class="panel-body">
                        <form action="{{ route('subjects.store') }}" method="post">
                            {{ csrf_field() }}
                            Subject name:
                            <br />
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <br /><br />
                            
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
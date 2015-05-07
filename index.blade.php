@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if ($errors > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input. Check Username and Password<br><br>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('blog') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Username:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password:</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

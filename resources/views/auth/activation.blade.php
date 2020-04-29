@extends('layouts.app')

@section('template_title')
	{{ trans('titles.activation') }}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="card card-default header-card text-white">
					<div class="card-header">{{ trans('titles.activation') }}</div>
					<div class="card-body">
						<p>{{ trans('auth.regThanks') }}</p>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
						<p>{{ trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
						<p>{{ trans('auth.clickInEmail') }}</p>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
						<p><a href='/activation' class="btn btn-primary">{{ trans('auth.clickHereResend') }}</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

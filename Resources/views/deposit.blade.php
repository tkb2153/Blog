@extends('common.microservice', ['style'=>''])

@section('content')
<h1>default - content</h1>
<div class="container">
	@foreach ($data as $_ => $value)
	<div class="row">
		<div class="col">
			{{$value['name']}}
		</div>
		<div class="col">
			{{$value['content']}}
		</div>
		<div class="col">
			@if ($menu_list->isPermission('Microservices-A.member.create'))
			<a href="javascript:;">create</a>
			@endif
			@if ($menu_list->isPermission('Microservices-A.member.update'))
			<a href="javascript:;">update</a>
			@endif
			@if ($menu_list->isPermission('Microservices-A.member.delete'))
			<a href="javascript:;">delete</a>
			@endif
		</div>
	</div>
	@endforeach
</div>
@stop
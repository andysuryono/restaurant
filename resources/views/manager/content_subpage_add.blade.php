<h3 class="page-header"><i class="icon_documents_alt"></i> Add subpage</h3>

<div class="wrapper">

	{!! Form::open(['url' => route('msubpagesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		<label class="control-label col-sm-2" >Parent page</label>
		<div class="col-sm-8">
			@if($parents)
			<select class="form-control" name="page_id">
				@foreach($parents as $key => $parent)
				<option value="{{ $key }}">{{ $parent }}</option>
				@endforeach
			</select>					
			@endif
		</div>
	</div>   

	<div class="form-group">
		{!! Form::label('title', 'Title:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('title', old('title'), ['class' => 'form-control','placeholder'=>'Put title here']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::textarea('text', old('text'), ['class' => 'form-control ckeditor','placeholder'=>'Put tex here']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
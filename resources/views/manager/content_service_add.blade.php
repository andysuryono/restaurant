<h3 class="page-header"><i class="fa fa-coffee"></i> Add service</h3>

<div class="wrapper">

	{!! Form::open(['url'=>route('mservicesAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
	<div class="form-group">
		{!! Form::label('name','Имя сервиса',['class'=>'col-sm-2 control-label']) !!}   
		<div class="col-sm-8">
			{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('alias', 'Псевдоним:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним']) !!}
		</div>
	</div>

	@if($add == 'icn')
	<!-- <button class="btn btn-default" data-iconset="fontawesome" data-icon="fa-wifi" role="iconpicker"></button> -->

	<div class="form-group">
		{!! Form::label('icon','Иконка',['class'=>'col-xs-2 control-label']) !!}   
		<div class="col-sm-8 ">
			<button name="icon" class="btn btn-default" data-iconset="fontawesome" data-placement="right" role="iconpicker"></button>
		</div>
	</div>
	@elseif($add == 'img')
	<div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>
	@endif

	<div class="form-group">
		{!! Form::label('text', 'Текст-1:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::textarea('text', old('text'), ['class' => 'form-control ckeditor','placeholder'=>'Введите текст страницы']) !!}
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
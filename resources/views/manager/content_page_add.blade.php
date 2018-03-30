<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add page</h3>

<div class="wrapper">

	{!! Form::open(['url' => route('mpagesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		{!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}   
		<div class="col-sm-8">
			{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя страницы']) !!}
		</div>
		<br /><br />
	</div>


	<div class="form-group">
		{!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
		</div>
		<br /><br />
	</div>


	<div class="form-group">
		{!! Form::label('title', 'Заголовок:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('title', old('title'), ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('text', 'Текст-1:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::textarea('text', old('text'), ['class' => 'form-control ckeditor','placeholder'=>'Введите текст страницы']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('text2', 'Текст-2:',['class'=>'col-sm-2 control-label','style'=>'margin-top:30px']) !!}
		<div class="col-sm-8"  style="margin-top: 30px;">
			{!! Form::textarea('text2', old('text2'), ['class' => 'form-control ckeditor','placeholder'=>'Введите текст страницы']) !!}
		</div>

	</div>

	<div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

	{!! Form::close() !!}

    </div>
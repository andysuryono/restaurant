<h3 class="page-header"><i class="fa fa-envelope-o"></i> Add testimonial</h3>

<div class="wrapper">
{!! Form::open(['url'=>route('mclientsAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Имя',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('position','Должность',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('position',old('position'),['class'=>'form-control','placeholder'=>'Введите должность']) !!}
        </div>
    </div>
 
    <div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>

    <div class="form-group">
		{!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::textarea('text', old('text'), ['class' => 'form-control ckeditor','placeholder'=>'Put text here']) !!}
		</div>
	</div>

	<div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

    {!! Form::close() !!}


</div>
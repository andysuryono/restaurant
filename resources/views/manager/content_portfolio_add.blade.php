<h3 class="page-header"><i class="fa fa-image"></i> Add Art</h3>

<div class="wrapper">

{!! Form::open(['url' => route('mportfoliosAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
        {!! Form::label('name','Название',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название блюда']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('mfilters', 'Категория:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::select('mfilters[]', $tags, false, ['multiple' => 'multiple', 'class' => 'form-control'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('newfilter', 'Добавить категорию:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('newfilter', old('newfilter'), ['class' => 'form-control','placeholder'=>'Введите название фильтра']) !!}
        </div>
    </div>
    
    <div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>

	<div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
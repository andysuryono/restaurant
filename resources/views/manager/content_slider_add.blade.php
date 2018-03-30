<h3 class="page-header"><i class="fa fa-film"></i> Add Slide</h3>

<div class="wrapper">
    {!! Form::open(['url'=>route('mslidersAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title','Имя',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>

 
    <div class="form-group">
            {!! Form::label('img', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::file('img', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
            </div>
    </div>


    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('text', old('text'), ['class' => 'form-control']) !!}
            <small class="help-block">Короткий текст (до 100 символов)</small>
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Save', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>


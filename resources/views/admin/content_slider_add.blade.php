<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('slidersAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title','Имя',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>

 
    <div class="form-group">
            {!! Form::label('img', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::file('img', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"", 'data-placeholder'=>"Файла нет"] ) !!}
            </div>
    </div>


    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('text', old('text'), ['id'=> 'editor', 'class' => 'form-control','placeholder'=>'Короткий текст (до 100 символов)']) !!}
        </div>
    </div>

    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>


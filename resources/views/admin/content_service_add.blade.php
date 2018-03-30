<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('servicesAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Имя сервиса',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним']) !!}
        </div>
    </div>
    
    @if($add == 'icn')
    <div class="form-group">
        {!! Form::label('icon','Иконка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            {!! Form::text('icon',old('icon'),[ 'class' => 'form-control fonticonpicker' , 'id' => 'icon' , 'placeholder'=>'Иконка для сервиса']) !!}
        </div>
    </div>
    @elseif($add == 'img')
    <div class="form-group">
            {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"", 'data-placeholder'=>"Файла нет"] ) !!}
            </div>
    </div>
    @endif

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=> 'editor', 'class' => 'form-control','placeholder'=>'Введите текст']) !!}
        </div>
    </div>

    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor');
    </script>


</div>


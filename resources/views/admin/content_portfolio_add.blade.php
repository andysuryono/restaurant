<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('portfoliosAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
        {!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название блюда']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('mfilters', 'Категория:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::select('mfilters[]', $tags, false, ['multiple' => 'multiple'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('newfilter', 'Добавить категорию:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('newfilter', old('newfilter'), ['class' => 'form-control','placeholder'=>'Введите название фильтра']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение','data-placeholder'=>"Файла нет"] ) !!}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-8 text-center">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
    {!! Form::close() !!}
</div>


<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('statsAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Имя показателя',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название счетчика']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon','Иконка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            {!! Form::text('icon',old('icon'),[ 'class' => 'form-control fonticonpicker' , 'id' => 'icon' , 'placeholder'=>'Иконка для счетчика']) !!}
        </div>
    </div>
   
    <div class="form-group">
        {!! Form::label('meters','Показания',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('meters',old('meters'), ['step' => 'any']) !!}
        </div>
     </div>

    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>


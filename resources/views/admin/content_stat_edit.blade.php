<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('statEdit',array('stats'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя сервиса',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_icon','Текущая иконка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            <div class="service_icon text-center"><i class="icon {{ $data['icon'] }}"></i></div>
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('icon','Выбрать иконку',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            {!! Form::text('icon', $data['icon'],['class' => 'form-control fonticonpicker' ,'id'=>'icon', 'placeholder'=>'Иконка для сервиса']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('meters', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::number('meters', $data['meters'], ['style' => 'width:20%', 'class' => 'form-control','placeholder'=>'Введите данные', 'step' => 'any']) !!}
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8 ">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>

<h3 class="page-header"><i class="fa fa-tachometer"></i> Edit Meter</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('mstatEdit',array('stats'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя сервиса',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_icon','Текущая иконка',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8 iconpicker-container">
            <div class="service_icon text-center"><i class="icon fa {{ $data['icon'] }}"></i></div>
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('icon','Выбрать иконку',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8 siconpicker-container">
			<button name="icon" class="btn btn-default" data-iconset="fontawesome" data-placement="right" role="iconpicker" data-icon="{{ $data['icon'] }}"></button>
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('meters', 'Текст:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::number('meters', $data['meters'], ['style' => 'width:20%', 'class' => 'form-control','placeholder'=>'Введите данные', 'step' => 'any']) !!}
        </div>
    </div>

<div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8 ">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>
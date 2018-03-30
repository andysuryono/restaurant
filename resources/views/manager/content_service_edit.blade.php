<h3 class="page-header"><i class="fa fa-coffee"></i> Edit Service</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('mserviceEdit',array('services'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя сервиса',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias','Псевдоним',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('alias',$data['alias'],['class'=>'form-control','placeholder'=>'Введите псевдоним']) !!}
        </div>
    </div>
   
    <div class="form-group">
        {!! Form::label('old_icon','Текущая иконка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8 iconpicker-container">
            @if($data['icon'])
            <div class="service_icon text-center"><i class="icon fa {{ $data['icon'] }}"></i></div>
            @else
            <div class="col-sm-offset-2 col-sm-10"><small>Иконка не требуется, т.к. блок находится в строке с изображениями</small></div>
            @endif
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('icon','Выбрать иконку',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8 siconpicker-container">
			<button name="icon" class="btn btn-default" data-iconset="fontawesome" data-placement="right" role="iconpicker" data-icon="{{ $data['icon'] }}"></button>
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-8 text-center">
            @if($data['images'])
            {!! Html::image('assets/images/'.$data['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
            @else
                <small>Изображение не требуется, т.к. блок находится в строке с иконками</small>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-placeholder'=>"Файла нет",'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
        {!! Form::textarea('text', $data['text'], ['class' => 'form-control ckeditor','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>

<div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

{!! Form::close() !!}

</div>
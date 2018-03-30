<h3 class="page-header"><i class="fa fa-film"></i> Editing Slide</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('msliderEdit',array('sliders'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('title','Заголовок',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('title',$data['title'],['class'=>'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_img', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-8 text-center">
            {!! Html::image('assets/images/slider/'.$data['img'],'',['class'=>'img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_img', $data['img']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('img', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::file('img', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение',  'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image', 'data-placeholder'=>'Файла нет'  ]) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('text', $data['text'], ['class' => 'form-control','placeholder'=>'Короткий текст (до 100 символов)']) !!}
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8 ">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>
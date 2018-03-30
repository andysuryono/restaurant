<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('sliderEdit',array('sliders'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('title','Заголовок',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('title',$data['title'],['class'=>'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_img', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8 text-center">
            {!! Html::image('assets/images/slider/'.$data['img'],'',['class'=>'img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_img', $data['img']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('img', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('img', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-placeholder'=>"Файла нет"]) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('text', $data['text'], ['class' => 'form-control','placeholder'=>'Короткий текст (до 100 символов)']) !!}
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8 ">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>

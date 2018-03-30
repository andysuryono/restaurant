<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('portfolioEdit',array('portfolios'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя сервиса',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8 text-center">
         
            {!! Html::image('assets/images/img-portfolio/'.$data['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
            
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение', 'data-placeholder'=>"Файла нет"]) !!}
        </div>
    </div>
    
     <div class="form-group">
        {!! Form::label('mfilters', 'Категория:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::select('mfilters[]', $tags , $fselected , ['multiple' => 'multiple', 'class' => 'form-control'] ) !!}
        </div>
    </div>

    
    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8 ">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>

<h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit Page</h3>

<div class="wrapper">

{!! Form::open(['url' => route('mpagesEdit',array('page'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
             {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Введите название страницы']) !!}
                 </div>
    </div>
    {!! Form::hidden('id', $data['id']) !!}

    <div class="form-group">
             {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('alias', $data['alias'], ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('title', 'Заголовок:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('title', $data['title'], ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('text', 'Текст-1:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::textarea('text', $data['text'], ['class' => 'form-control ckeditor','placeholder'=>'Введите короткий текст (до 255 символов)']) !!}
                 </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-offset-2 col-sm-10">
            {!! Html::image('assets/images/'.$data['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-placeholder'=>"Файла нет", 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image']) !!}
        </div>
    </div>


    <div class="form-group">
             {!! Form::label('text2', 'Текст-2:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::textarea('text2', $data['text2'], ['class' => 'form-control ckeditor','placeholder'=>'Введите текст страницы']) !!}
                 </div>
    </div>
    
    
   
    
    <div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

{!! Form::close() !!}

</div>
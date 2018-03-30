<h3 class="page-header"><i class="fa fa-thumbs-o-up"></i> Edit Chief</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('mpeopleEdit',array('peoples'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите имя']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias','Псевдоним',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('alias',$data['alias'],['class'=>'form-control','placeholder'=>'Введите имя']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8 text-center">
            {!! Html::image('assets/images/img-teams/'.$data['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
        </div>
    </div>

    <div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>>
    
    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
        {!! Form::textarea('text', $data['text'], ['class' => 'form-control ckeditor','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>>


<div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>

</div>
<h3 class="page-header"><i class="fa fa-image"></i> Edit Art</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('mportfolioEdit',array('portfolios'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя сервиса',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8 text-center">
         
            {!! Html::image('assets/images/img-portfolio/'.$data['images'],'',['class'=>'img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
            
        </div>
    </div>

    <div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>
    
     <div class="form-group">
        {!! Form::label('mfilters', 'Категория:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::select('mfilters[]', $tags , $fselected , ['multiple' => 'multiple', 'class' => 'form-control'] ) !!}
        </div>
    </div>

    <div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
<h3 class="page-header"><i class="fa fa-tachometer"></i> Add Meter</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('mstatsAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Имя показателя',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название счетчика']) !!}
        </div>
    </div>

    <div class="form-group">
		{!! Form::label('icon','Иконка',['class'=>'col-sm-2 control-label']) !!}   
		<div class="col-sm-8 ">
			<button name="icon" class="btn btn-default" data-iconset="fontawesome" data-placement="right" role="iconpicker"></button>
		</div>
	</div>
   
    <div class="form-group">
        {!! Form::label('meters','Показания',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8">
        {!! Form::input('number','meters',old('price'), ['step' => 'any', 'class' => 'form-control', 'style' => 'width:20%']) !!}
        </div>
    </div>

	<div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
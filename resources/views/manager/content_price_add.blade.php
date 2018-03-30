<h3 class="page-header"><i class="fa fa-money"></i> Add Tariff</h3>

<div class="wrapper">

{!! Form::open(['url' => route('mpricesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('name','Название',['class'=>'col-sm-2 control-label']) !!}   
            <div class="col-sm-8">
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Название блюда']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('text', 'Текст:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('text', old('text'), ['class' => 'form-control','placeholder'=>'Небольшой текст (до 100 символов)']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('position','Позиция',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-sm-8">
                {!! Form::input('number' ,'position', ( (old('position')) ? old('position') : 0 ), ['class' => 'form-control', 'style' => 'width:20%'] ) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('price','Цена [$]',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-sm-8">
                {!! Form::input('number','price',old('price'), ['step' => 'any', 'class' => 'form-control', 'style' => 'width:20%']) !!}
            </div>
        </div>

    <div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
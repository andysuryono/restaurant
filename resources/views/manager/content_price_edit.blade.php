<h3 class="page-header"><i class="fa fa-money"></i> Edit Tariff</h3>

<div class="wrapper">

{!! Form::open(['url'=>route('mpriceEdit',array('prices'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Название тарифа',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название тарифа']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text','Название тарифа',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::text('text',$data['text'],['class'=>'form-control','placeholder'=>'Небольшой текст (до 100 символов)']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_position','Текущая позиция',['class'=>'col-sm-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::input('number' ,'position',$data['position'], ['class' => 'form-control', 'style' => 'width:20%'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_price','Цена',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-sm-8">
            {!! Form::input('number', 'price',$data['price'], ['class' => 'form-control', 'style' => 'width:20%'] ) !!}
        </div>
    </div>

<div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
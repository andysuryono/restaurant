<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('priceEdit',array('prices'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Название тарифа',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название тарифа']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text','Название тарифа',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('text',$data['text'],['class'=>'form-control','placeholder'=>'Небольшой текст (до 100 символов)']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_position','Текущая позиция',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('position',$data['position']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_price','Цена',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('price',$data['price']) !!}
        </div>
    </div>

    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>

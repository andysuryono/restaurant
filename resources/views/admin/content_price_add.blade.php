<div style="margin:0px 50px 100px 50px;">

    <div class="wrapper container">

        {!! Form::open(['url' => route('pricesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-xs-10">
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Название блюда']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::text('text', old('text'), ['class' => 'form-control','placeholder'=>'Небольшой текст (до 100 символов)']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('position','Позиция',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-xs-8">
                {!! Form::number('position', ( (old('position')) ? old('position') : 0 ) ) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('price','Цена [$]',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-xs-8">
                {!! Form::number('price',old('price'), ['step' => 'any']) !!}
            </div>
        </div>


        <div class="form-group text-center">

        <div class="col-xs-offset-2 col-xs-10" style="margin-top: 30px;">
                {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
            </div>
        </div>


        {!! Form::close() !!}


    </div>

</div> 

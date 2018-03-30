<div style="margin:0px 50px 100px 50px;">

    <div class="wrapper container">

        {!! Form::open(['url' => route('pagesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-xs-10">
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя страницы']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('title', 'Заголовок:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::text('title', old('title'), ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
            </div>
            <br /><br />
        </div>

        <div class="form-group">
            {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"", 'data-placeholder'=>"Файла нет"] ) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Текст-1:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
            </div>
            <br /><br />
        </div>


        <div class="form-group">
            {!! Form::label('text2', 'Текст-2:',['class'=>'col-xs-2 control-label','style'=>'margin-top:30px']) !!}
            <div class="col-xs-10"  style="margin-top: 30px;">
                {!! Form::textarea('text2', old('text2'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
            </div>

        </div>


        <div class="form-group text-center">

        <div class="col-xs-offset-2 col-xs-10" style="margin-top: 30px;">
                {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
            </div>
        </div>


        {!! Form::close() !!}


        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.replace('editor2');
        </script>
        

    </div>

</div> 

<div class="wrapper container">

        {!! Form::open(['url' => route('subpagesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('page_id', 'Parent page:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">

                    @if($parents)
                    {!! Form::select('page_id', $parents, ['class' => 'selectpicker']) !!}
                    @endif
                </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Title:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::text('title', old('title'), ['class' => 'form-control','placeholder'=>'Put title here']) !!}
            </div>
            <br /><br />
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-10">
                {!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Put tex here']) !!}
            </div>
            <br /><br />
        </div>

        <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-10" style="margin-top: 30px;">
                {!! Form::button('Save', ['class' => 'btn','type'=>'submit']) !!}
            </div>
        </div>


        {!! Form::close() !!}

        <script>
            CKEDITOR.replace('editor');
        </script>

</div>




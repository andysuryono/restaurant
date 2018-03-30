<div class="wrapper container-fluid">
{!! Form::open(['url' => route('subpageEdit',array('subpage'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Название:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('title', $data['title'], ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>
    {!! Form::hidden('id', $data['id']) !!}

    <div class="form-group">
        {!! Form::label('page_id', 'Parent page:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-10">
            {!! Form::select('page_id', $parents, ($data['page_id'] ?  $data['page_id'] : '') )!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['text'], ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст)']) !!}
        </div>
    </div>
   
    
    <div class="form-group text-center">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>

{!! Form::close() !!}

 <script>
        CKEDITOR.replace( 'editor' );
</script>
</div>



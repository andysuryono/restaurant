<h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit subpage</h3>

<div class="wrapper">

{!! Form::open(['url' => route('msubpageEdit',array('subpage'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Название:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('title', $data['title'], ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>
    {!! Form::hidden('id', $data['id']) !!}


	<div class="form-group">
        <label class="control-label col-sm-2" >Parent page</label>
        <div class="col-sm-8">
		@if($parents)
			<select class="form-control" name="page_id">
				@foreach($parents as $key => $parent)
					@if($key == $data['page_id'])
						<option value="{{ $key }}" selected="">{{ $parent }}</option>
					@else
						<option value="{{ $key }}">{{ $parent }}</option>
					@endif
				@endforeach
			</select>					
		@endif
        </div>
    </div> 

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('text', $data['text'], ['class' => 'form-control ckeditor','placeholder'=>'Введите текст)']) !!}
        </div>
    </div>

    <div class="form-group text-center">
		<div class="col-sm-offset-2 col-sm-8">
			{!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>
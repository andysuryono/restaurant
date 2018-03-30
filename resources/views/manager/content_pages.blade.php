<h3 class="page-header"><i class="fa fa-file-text-o"></i> Pages</h3>

<div class="text-center">
   <a class="btn btn-info" href="{{route('mpagesAdd')}}" title="Add Page"><span class="fa fa-plus"></span> Add Page</a>
</div>
<br />

@if($pages)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th class="text-center"><!-- <i class="fa fa-user"></i> --> Name</th>
                <th class="text-center"><i class="fa fa-flag-o"></i> Title</th>
                <th class="text-center"> Alias</th>
                <th class="text-center"><i class="fa fa-file-text-o"></i> Text1</th>
                <th class="text-center"><i class="fa fa-image"></i> Picture</th>
                <th class="text-center"><i class="fa fa-file-text-o"></i> Text2</th>
                <th class="text-center"><i class="fa fa-calendar-o"></i> Date</th>
                <th class="text-center" colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $k=>$page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{!! Html::link(route('mpagesEdit',['page'=>$page->id]), $page->name, ['alt'=>$page->name] ) !!}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->alias }}</td>
                <td>{{ $page->text }}</td>
                <td><a href="{{ asset('assets/images/'.$page->images) }}" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">{!! Html::image('assets/images/'.$page->images,'',array('style'=>'width:150px', 'class' => 'img-fluid')) !!}</a></td>
                <td>{{ $page->text2 }}</td>
                <td>{{ $page->created_at }}</td>
                <td>
                        <a class="btn btn-success" href="{{ route('mpagesEdit', $page->id) }}"><i class="fa fa-edit" ></i></a>
                 </td>
                <td>
                    {!! Form::open(['url'=>route('mpagesEdit',['page'=>$page->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                    {{ method_field('delete') }}
                    {!! Form::button('<i class="fa fa-close"></i>', ['class'=>'btn btn-danger','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

    <br />
    <div class="text-center">
	   <a class="btn btn-info" href="{{route('mpagesAdd')}}" title="Add Page"><span class="fa fa-plus"></span> Add Page</a>
	</div>

<hr style="border: none;color: #acb1b8; background-color: #acb1b8; height: 1px;">

	<h3 class="page-header"><i class="icon_documents_alt"></i> Subpages</h3>

	<div class="text-center">
	   <a class="btn btn-info" href="{{route('msubpagesAdd')}}" title="Add Subpage"><span class="fa fa-plus"></span> Add Subpage</a>
	</div>
	<br />
	
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th class="text-center"><i class="icon_ribbon_alt"></i> Title</th>
                <th class="text-center"><!-- <i class="icon_documents_alt"></i> --> Parent</th>
                <th class="text-center"><i class="icon_document_alt"></i> Text</th>
                <th class="text-center"><i class="icon_calendar"></i> Date</th>
                <th class="text-center" colspan="2"><i class="icon_cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($pages as $value)
                @foreach($value->subpages as $subpage)
                <tr>
                    <td>{{ $subpage['id'] }}</td>
                    <td>{!! Html::link(route('msubpageEdit',['subpage'=>$subpage->id]), $subpage->title, ['alt'=>$subpage->title]) !!}</td>
                    <td>{{  $value['name'] }}</td>
                    <td>{{ $subpage['text'] }}</td>
                    <td>{{ $subpage['created_at'] }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('msubpageEdit', $subpage->id) }}"><i class="icon_pencil-edit" ></i></a>
                 	</td>
                    <td>
                    {!! Form::open(['url'=>route('msubpageEdit',['subpage'=>$subpage->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        {{ method_field('delete') }}
                        {!! Form::button('<i class="icon_close_alt2"></i>', ['class'=>'btn btn-danger','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                </tr>
                @endforeach
           @endforeach
        </tbody>
    </table>

	<br />
	<div class="text-center">
	   <a class="btn btn-info" href="{{route('msubpagesAdd')}}" title="Add Subpage"><span class="fa fa-plus"></span> Add Subpage</a>
	</div>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
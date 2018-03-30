<h3 class="page-header"><i class="fa fa-thumbs-o-up"></i> Chefs</h3>


@if($peoples)
<div class="text-center">
 <a class="btn btn-info" href="{{route('mpeoplesAdd')}}" title="Add Chief"><span class="fa fa-plus"></span> Add Chief</a>
</div>
<br />

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-flag-o"></i> Alias</th>
                <th class="text-center"><i class="fa fa-image"></i> Picture</th>
                <th class="text-center"><i class="fa fa-file-text-o"></i> Text</th>
                <th class="text-center"><i class="fa fa-calendar-o"></i> Date</th>
         		<th class="text-center" colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peoples as $k => $people)
            <tr>
                <td>{{ $people->id }}</td>
                <td>{!! Html::link(route('mpeopleEdit',['people'=>$people->id]), $people->name, ['alt'=>$people->name] ) !!}</td>
                <td>{{ $people->alias }}</td>
                <td class="text-center">
                    {!! Html::image('assets/images/img-teams/'.$people->images,'',array('style'=>'width:100px')) !!}
                </td>
                <td>{{ $people->text }}</td>
                <td>{{ $people->created_at }}</td>
                <td>
		            <a class="btn btn-success" href="{{ route('mpeopleEdit', $people->id) }}"><i class="fa fa-edit" ></i></a>
		        </td>
		        <td>      
		            {!! Form::open(['url'=>route('mpeopleEdit',['people'=>$people->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
		            {{ method_field('delete') }}
		            {!! Form::button('<i class="fa fa-close"></i>',['class'=>'btn btn-danger','type'=>'submit']) !!}
		            {!! Form::close() !!}
		        </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


<br />
<div class="text-center">
 <a class="btn btn-info" href="{{route('mpeoplesAdd')}}" title="Add Chief"><span class="fa fa-plus"></span> Add Chief</a>
</div>
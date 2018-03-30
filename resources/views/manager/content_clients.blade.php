<h3 class="page-header"><i class="fa fa-envelope-o"></i> Feedback</h3>

@if($clients)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-graduation-cap"></i> Rank</th>
                <th class="text-center"><i class="fa fa-image"></i> Picture</th>
                <th class="text-center"><i class="fa fa-file-text-o"></i> Text</th>
                <th class="text-center"><i class="fa fa-calendar-o"></i> Date</th>
         		<th class="text-center" colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $k => $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{!! Html::link(route('mclientEdit',['client'=>$client->id]), $client->name, ['alt'=>$client->name] ) !!}</td>
                <td>{{ $client->position }}</td>
                <td class="text-center">
                    {!! Html::image('assets/images/clients/'.$client->images,'',array('style'=>'width:100px')) !!}
                </td>
                <td>{{ $client->text }}</td>
                <td>{{ $client->created_at }}</td>
                <td>
		            <a class="btn btn-success" href="{{ route('mclientEdit', $client->id) }}"><i class="fa fa-edit" ></i></a>
		        </td>
		        <td>      
		            {!! Form::open(['url'=>route('mclientEdit',['client'=>$client->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
 <a class="btn btn-info" href="{{route('mclientsAdd')}}" title="Add testimonial"><span class="fa fa-plus"></span> Add testimonial</a>
</div>
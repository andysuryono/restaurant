<h3 class="page-header"><i class="fa fa-coffee"></i> Services</h3>

@if($services)
<div class="text-center">
 <a class="btn btn-info" href="{{route('mservicesAdd')}}" title="Add Service"><span class="fa fa-plus"></span> Add service</a>
</div>
<br />

<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-bookmark-o"></i> Alias</th>
                <th class="text-center"><i class="fa fa-image"></i> Picture</th>
                <th class="text-center"><i class="fa fa-file-text-o"></i> Text</th>
                <th class="text-center"><i class="fa fa-calendar-o"></i> Date</th>
         		<th class="text-center" colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $k => $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{!! Html::link(route('mserviceEdit',['service'=>$service->id]), $service->name, ['alt'=>$service->name] ) !!}</td>
                <td>{{ $service->alias }}</td>
                <td class="text-center">
                    @if($service->icon)
                    <div class="service_icon icon text-center"><i class="fa {{ $service->icon }}"></i></div>
                    @endif
                    @if($service->images)
                    {!! Html::image('assets/images/'.$service->images,'',array('style'=>'width:150px')) !!}
                    @endif
                </td>
                <td>{{ $service->text }}</td>
                <td>{{ $service->created_at }}</td>
                <td>
		            <a class="btn btn-success" href="{{ route('mserviceEdit', $service->id) }}"><i class="fa fa-edit" ></i></a>
		        </td>
		        <td>      
		            {!! Form::open(['url'=>route('mserviceEdit',['service'=>$service->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
 <a class="btn btn-info" href="{{route('mservicesAdd')}}" title="Add Service"><span class="fa fa-plus"></span> Add service</a>
</div>
<h3 class="page-header"><i class="fa fa-line-chart"></i> Stats</h3>

@if($stats)
<div class="text-center">
 <a class="btn btn-info" href="{{route('mstatsAdd')}}" title="Add Tariff"><span class="fa fa-plus"></span> Add meter</a>
</div>
<br />

<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th class="text-center"><i class="fa fa-image"></i> Icon</th>
                <th><i class="fa fa-tachometer"></i> Meters</th>
                <th><i class="fa fa-calendar-o"></i> Date</th>
                <th class="text-center"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats as $k => $stat)
            <tr>
                <td>{{ $stat->id }}</td>
                <td>{!! Html::link(route('mstatEdit',['stat'=>$stat->id]), $stat->name, ['alt'=>$stat->name] ) !!}</td>
                
                <td class="text-center">
                    <div class="service_icon icon text-center"><i class="fa {{ $stat->icon }}"></i></div>
                </td>
                <td>{{ $stat->meters }}</td>
                <td>{{ $stat->created_at }}</td>
                <td>
		            <a class="btn btn-success" href="{{ route('mstatEdit', $stat->id) }}"><i class="fa fa-edit" ></i></a>
		        </td>
		        <td>      
		            {!! Form::open(['url'=>route('mstatEdit',['stat'=>$stat->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
 <a class="btn btn-info" href="{{route('mstatsAdd')}}" title="Add Tariff"><span class="fa fa-plus"></span> Add meter</a>
</div>
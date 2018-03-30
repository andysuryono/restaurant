<h3 class="page-header"><i class="fa fa-money"></i> Menu</h3>

@if($prices)
<div class="text-center">
 <a class="btn btn-info" href="{{route('mpricesAdd')}}" title="Add Tariff"><span class="fa fa-plus"></span> Add tariff</a>
</div>
<br />

<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-thumb-tack"></i> Position</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-file-text-o"></i> Text</th>
                <th><i class="fa fa-usd"></i> Price</th>
                <th><i class="fa fa-calendar-o"></i> Date</th>
                <th class="text-center" colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $k => $price)
            <tr>
                <td>{{ $price->position }}</td>
                <td>{!! Html::link(route('mpriceEdit',['price'=>$price->id]), $price->name, ['alt'=>$price->name] ) !!}</td>
                <!-- <td>{{-- $service->alias --}}</td> -->
                <td>{{ $price->text }}</td>
                <td>{{ $price->price }}</td>
                <td>{{ $price->created_at }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('mpriceEdit', $price->id) }}"><i class="fa fa-edit" ></i></a>
                 </td>
                <td>
                    {!! Form::open(['url'=>route('mpriceEdit',['price'=>$price->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
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
 <a class="btn btn-info" href="{{route('mpricesAdd')}}" title="Add Tariff"><span class="fa fa-plus"></span> Add tariff</a>
</div>
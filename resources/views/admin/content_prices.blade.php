<div style="margin:0px 50px 50px 50px;">
    @if($prices)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Позиция</th>
                <th>Имя</th>
                <!-- <th>Псевдоним</th> -->
                <th>Текст</th>
                <th>Цена</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $k => $price)
            <tr>
                <td>{{ $price->position }}</td>
                <td>{!! Html::link(route('priceEdit',['price'=>$price->id]), $price->name, ['alt'=>$price->name] ) !!}</td>
                <!-- <td>{{-- $service->alias --}}</td> -->
                <td>{{ $price->text }}</td>
                <td>{{ $price->price }}</td>
                <td>{{ $price->created_at }}</td>
                <td>
                {!! Form::open(['url'=>route('priceEdit',['price'=>$price->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{ method_field('delete') }}
                    {!! Form::button('Удалить',['class'=>'btn','type'=>'submit']) !!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <br />
    <div class="portfolio">
        <div id="filters" class="sixteen columns">
            <ul style="padding:0px 0px 0px 0px">
                <li><a  href="{{route('pricesAdd')}}"><h5>Add Tariff</h5></a></li>
            </ul>
        </div>
    </div>
</div>


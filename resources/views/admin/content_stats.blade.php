<div style="margin:0px 50px 50px 50px;">
    @if($stats)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <!-- <th>Псевдоним</th> -->
                <th class="text-center">Иконка</th>
                <th>Показания</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats as $k => $stat)
            <tr>
                <td>{{ $stat->id }}</td>
                <td>{!! Html::link(route('statEdit',['stat'=>$stat->id]), $stat->name, ['alt'=>$stat->name] ) !!}</td>
                
                <td class="text-center">
                    <div class="service_icon icon text-center"><i class="{{ $stat->icon }}"></i></div>
                </td>
                <td>{{ $stat->meters }}</td>
                <td>{{ $stat->created_at }}</td>
                <td>
                {!! Form::open(['url'=>route('statEdit',['stat'=>$stat->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
                <li><a  href="{{route('statsAdd')}}"><h5>Add Meters</h5></a></li>
            </ul>
        </div>
    </div>
</div>


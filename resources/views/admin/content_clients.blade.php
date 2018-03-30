<div style="margin:0px 50px 50px 50px;">
    @if($clients)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Должность</th>
                <th class="text-center">Изображение</th>
                <th>Текст</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $k => $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{!! Html::link(route('clientEdit',['client'=>$client->id]), $client->name, ['alt'=>$client->name] ) !!}</td>
                <td>{{ $client->position }}</td>
                <td class="text-center">
                    {!! Html::image('assets/images/clients/'.$client->images,'',array('style'=>'width:100px')) !!}
                </td>
                <td>{{ $client->text }}</td>
                <td>{{ $client->created_at }}</td>
                <td>
                {!! Form::open(['url'=>route('clientEdit',['client'=>$client->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
                <li><a  href="{{route('clientsAdd')}}"><h5>Add testimonial</h5></a></li>
            </ul>
        </div>
    </div>
</div>


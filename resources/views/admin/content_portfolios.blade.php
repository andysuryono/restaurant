<div style="margin:0px 50px 50px 50px;">
    
    @if($portfolios)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фильтр</th>
                <th>Изображение</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $k => $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{!! Html::link(route('portfolioEdit',['portfolio'=>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name]) !!}</td>
                <td>{{ $portfolio->mfilter }}</td>
                <td>{!! Html::image('assets/images/img-portfolio/'.$portfolio->images,'',array('style'=>'width:150px')) !!}</td>
                <td>{{ $portfolio->created_at }}</td>
                <td>
                    {!! Form::open(['url'=>route('portfolioEdit',['portfolio'=>$portfolio->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        {{ method_field('delete') }}
                        {!! Form::button('Удалить', ['class'=>'btn','type'=>'submit']) !!}
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
                <li><a  href="{{route('portfoliosAdd')}}"><h5>Add Art</h5></a></li>
            </ul>
        </div>
    </div>
</div>


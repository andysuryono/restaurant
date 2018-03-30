<div style="margin:0px 50px 0px 50px;">

<h5>Pages:</h5>
    
@if($pages)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nav name</th>
                <th>Title</th>
                <th>Alias</th>
                <th>Text1</th>
                <th>Image</th>
                <th>Text2</th>
                <th>Date of creation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $k=>$page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{!! Html::link(route('pagesEdit',['page'=>$page->id]), $page->name, ['alt'=>$page->name] ) !!}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->alias }}</td>
                <td>{{ $page->text }}</td>
                <td>{!! Html::image('assets/images/'.$page->images,'',array('style'=>'width:150px')) !!}</td>
                <td>{{ $page->text2 }}</td>
                <td>{{ $page->created_at }}</td>
                <td>
                    {!! Form::open(['url'=>route('pagesEdit',['page'=>$page->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        <!--<input type="hidden" name="_method" value="DELETE">-->
                        {{ method_field('delete') }}
                        {!! Form::button('Delete', ['class'=>'btn','type'=>'submit']) !!}
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
                <li><a  href="{{route('pagesAdd')}}"><h5>Add Page</h5></a></li>
            </ul>

        {{--!! Html::link(route('pagesAdd'), 'Новая страница') !!--}}
        </div>
     </div>

<br /><br />

<h5>Subages:</h5>
  
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Parent page</th>
                <th>Text</th>
                <th>Date of creation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($pages as $value)
                @foreach($value->subpages as $subpage)
                <tr>
                    <td>{{ $subpage['id'] }}</td>
                    <td>{!! Html::link(route('subpageEdit',['subpage'=>$subpage->id]), $subpage->title, ['alt'=>$subpage->title]) !!}</td>
                    <td>{{  $value['name'] }}</td>
                    <td>{{ $subpage['text'] }}</td>
                    <td>{{ $subpage['created_at'] }}</td>
                    <td>
                    {!! Form::open(['url'=>route('subpageEdit',['subpage'=>$subpage->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        <!--<input type="hidden" name="_method" value="DELETE">-->
                        {{ method_field('delete') }}
                        {!! Form::button('Delete', ['class'=>'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                </tr>
                @endforeach
           @endforeach
        </tbody>
    </table>


    <br />
    <div class="portfolio">
        <div id="filters" class="sixteen columns">
            <ul style="padding:0px 0px 0px 0px">
                <li><a  href="{{route('subpagesAdd')}}"><h5>Add Subpage</h5></a></li>
            </ul>

        {{--!! Html::link(route('subpagesAdd'), 'Новая страница') !!--}}
        </div>
     </div>


</div>
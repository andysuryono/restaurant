<h3 class="page-header"><i class="fa fa-film"></i> Sliders</h3>

@if($sliders)
<div class="text-center">
 <a class="btn btn-info" href="{{route('mslidersAdd')}}" title="Add Slide"><span class="fa fa-plus"></span> Add Slide</a>
</div>
<br />

<table class="table table-striped table-advance table-hover">
    <tbody>
        <tr>
         <th>ID</th>
         <th class="text-center"><i class="fa fa-flag-o"></i> Title</th>
         <th class="text-center"><i class="fa fa-image"></i> Picture</th>
         <th class="text-center"><i class="<i class="fa fa-file-text-o"></i> Text</th>
         <th class="text-center"><i class="fa fa-calendar-o"></i> Date</th>
         <th class="text-center" colspan="2"><i class="fa fa-cogs"></i> Action</th>
     </tr>
     @foreach($sliders as $k => $slider)
     <tr>
        <td>{{ $slider->id }}</td>
        <td>{!! Html::link(route('msliderEdit',['slider'=>$slider->id]), $slider->title, ['alt'=>$slider->title] ) !!}</td>
        <td class="text-center">
            {!! Html::image('assets/images/slider/'.$slider->img,'',array('style'=>'width:150px', 'class' => 'featured-work-img')) !!}
        </td>
        <td>{{ $slider->text }}</td>
        <td>{{ $slider->created_at }}</td>
        <td>
            <a class="btn btn-success" href="{{ route('msliderEdit', $slider->id) }}"><i class="fa fa-edit" ></i></a>
        </td>
        <td>      
            {!! Form::open(['url'=>route('msliderEdit',['slider'=>$slider->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
 <a class="btn btn-info" href="{{route('mslidersAdd')}}" title="Add Slide"><span class="fa fa-plus"></span> Add Slide</a>
</div>
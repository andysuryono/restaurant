<h3 class="page-header"><i class="fa fa-image"></i> Gallery</h3>

<div class="text-center">
   <a class="btn btn-info" href="{{route('mportfoliosAdd')}}" title="Add Art"><span class="fa fa-plus"></span> Add Art</a>
</div>
<br />

@if($portfolios)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-filter"></i> Category</th>
                <th><i class="fa fa-image"></i> Picture</th>
                <th><i class="fa fa-calendar-o"></i> Date</th>
                <th colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $k => $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{!! Html::link(route('mportfolioEdit',['portfolio'=>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name]) !!}</td>
                <td>{{ $portfolio->mfilter }}</td>
                <td>
                <a class="image-popup-vertical-fit" href="{{ asset('assets') }}/images/img-portfolio/{{ $portfolio->images }}" title="Title">
                {!! Html::image('assets/images/img-portfolio/'.$portfolio->images,'',array('style'=>'width:150px')) !!}</a>
                </td>
                <td>{{ $portfolio->created_at }}</td>
                <td>
		            <a class="btn btn-success" href="{{ route('mportfolioEdit', $portfolio->id) }}"><i class="fa fa-edit" ></i></a>
		        </td>
		        <td>      
		            {!! Form::open(['url'=>route('mportfolioEdit',['portfolio'=>$portfolio->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
<div class="text-center">   <a class="btn btn-info" href="{{route('mportfoliosAdd')}}" title="Add Art"><span class="fa fa-plus"></span> Add Art</a>
</div>

<!-- <script>
$(document).ready(function() {
  
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        closeOnBgClick: true,
        closeBtnInside: true,
        image: {
            verticalFit: true
        }
          
    });


  
});
</script> -->
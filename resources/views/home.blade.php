@extends('layouts.app')
<style type="text/css">
    .avatar{
        border-radius:100%;
        max-width:100px;
    }

</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(count($errors) >0)
                    @foreach($errors ->all() as $error)
                        <div class="alert alert-danger">{{@error}}</div>
                    @endforeach

                @endif 



                 @if(session('response'))
                    <div class="alert alert-success">{{session('response')}}</div>
                @endif
            <div class="panel panel-default">
         
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

            <!-- Working on the profile -->
                    <div class="panel-body">
                        <div class="col-md-4">
                        
                 @if(!empty($profile))

                        <img src="{{$profile->profile_pic}}" class ="avatar" alt=""/>
                        
                        @else
                        <img src="{{url('images/avater.jfif')}}" class ="avatar" alt=""/>
                  @endif


                 @if(!empty($profile))

                        <img src="{{$profile->name}}" class ="avatar" alt=""/>
                        <p><strong>Name:</strong>{{$profile->name}}</p>
                        @else
                        <p></p>
                  @endif




                 @if(!empty($profile))

                    <img src="{{$profile->designation}}" class ="avatar" alt=""/>
                    <p><strong>Role:</strong>{{$profile->designation}}</p>
                    @else
                    <p></p>
                 @endif

                 
                    
                        </div>
                        <div class="col-md-8">
                            @if(count($posts)>0)

                                @foreach($posts->all() as $post)
                                <br><br>
                                    <h4>{{  $post->post_title}}</h4>
                                    <img src="{{$post->post_image}}" alt="">
                                    <br>
                                    <p>{{ substr($post->post_body,0,150) }}</p>

                                    <ul class="nav nav-pills">
                                        <li role="presentation">
                                            <a href='{{url("/view/{$post->id}")}}'>

                                                <span class="fa fa-eye"> VIEW</span>
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href='{{url("/edit/{$post->id}")}}'>

                                                <span class="fa fa-edit"> EDIT</span>
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href='{{url("/delete/{$post->id}")}}'>

                                                <span class="fa fa-trash"> DELETE</span>
                                            </a>
                                        </li>



                                    </ul>
                                    <hr>

                                    <cite style="float:left">Posted on:{{date('M j,Y H:i',strtotime($post->updated_at))}}</cite>
                                    
                                @endforeach
                                
                            @else
                                <p>No Post Available</p>
                            @endif

                            {{$posts->links()}}
                        </div>

                        <!-- working on the profile ends here -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

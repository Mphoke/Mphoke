@extends('layouts.app')
<!-- <style type="text/css">
    img{
        
        max-width:100px;
    }

</style> -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @if(session('response'))
                    <div class="alert alert-success">{{session('response')}}</div>
                @endif
       
            <div class="panel panel-default">
         
                <div class="panel-heading">Views </div>

                <div class="panel panel-default">

                      
                    
                        
                        <div class="col-md-8">
                            
                        <!-- More content -->
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
           
                <span class="border border-dark">
                <div class="panel-heading">Edit View</div>
                
                </span>
               
                
                <div class="container">
                <div class="col-md-8">
                            @if(count($posts)>0)

                                @foreach($posts->all() as $post)
                                    <h4>{{  $post->post_title}}</h4>
                                    <img src="{{$post->post_image}}" alt="">
                                    <br>
                                    <p>{{ $post->post_body }}</p>

                                    <ul class="nav nav-pills">
                                        <li role="presentation">
                                            <a href='{{url("/like/{$post->id}")}}'>

                                                <span class="fa fa-thumbs-up"> Like({{$likeCtr}})</span>
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href='{{url("/dislike/{$post->id}")}}'>

                                                <span class="fa fa-thumbs-down"> Dislike({{$dislikeCtr}})</span>
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href='{{url("/comment/{$post->id}")}}'>

                                                <span class="fa fa-comment">Comment</span>
                                            </a>
                                        </li>



                                    </ul>


                                    
                                @endforeach
                            @else
                                <p>No Post Available</p>
                            @endif

                        <form method="POST" action='{{url("/comment/{$post->id}")}}'>
                            {{csrf_field()}}
                            <div class="col-md-6">
                          
                                <textarea id="post_body" row="5" class="form-control" name="comment" required></textarea>

                                @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div clas="form-group">
                                <button type="submit" class="btn btn-success ">Post Comment</button>

                            </div>




                        </form>

                        <!-- Comments and who posted -->

                            <br> <br>
                    <h4><strong>Comments</strong></h4>

                                @if(count($comments)>0)

                                @foreach($comments->all() as $comment)
                                <p>{{$comment->comment}}</p>
                                <p><strong>Posted by:</strong>{{$comment->name}}</p>

                                @endforeach
                                @else
                                <p>No Comment(s) Available</p>
                                @endif





                        <!-- tag ends here -->


                        </div>



        </div>

                </div>


                <div class="container">

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
                        <!-- <img src="{{url('images/avater-img.png')}}" class ="avatar" alt=""/> -->
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
                        </div>
                      

                       

                </div>
            </div>
        </div>
    </div>



                      

                                 
                        </div>

                <div class="panel-body">

                        <div class="col-md-4">
                            <ul class="list-group">
                            @if(count($categories)>0)
                                    @foreach($categories-> all() as $category)

                                    <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{$category->category}}</a></li>
                                @endforeach
                            @else

                                <p>No Category Found</p>
                            @endif


                                </ul>
                                 
                            </div> 

                            </div>
                        <!-- working on the profile ends here -->

                
            </div>
 <!-- working on the profile ends here -->
          
    </div>
</div>
@endsection

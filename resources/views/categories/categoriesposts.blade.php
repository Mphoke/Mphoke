@extends('layouts.app')
<!-- <style type="text/css">
    img{
        
        max-width:100px;
    }

</style> -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
       
            <div class="panel panel-default">
         
                <div class="panel-heading">Views </div>

                <div class="panel panel-default">

                      
                    
                        
                        <div class="col-md-8">
                            
                        <!-- More content -->
                        <div class="row">
        <div class="col-md-10 col-md-offset-2">
        @if(count($errors) >0)
                    @foreach($errors ->all() as $error)
                        <div class="alert alert-danger">{{@error}}</div>
                    @endforeach

                @endif 



                 @if(session('response'))
                    <div class="alert alert-success">{{session('response')}}</div>
                @endif
           
                <span class="border border-dark">
                <div class="panel-heading"><h4><strong>Post Category Selected for:</strong></h4> </div>
                
                </span>
               
                
                <div class="container">
                <div class="col-md-10">
                            @if(count($posts)>0)

                                @foreach($posts->all() as $post)
                                    <h4><strong>Category:</strong>{{  $post->post_title}}</h4>
                                    <img src="{{$post->post_image}}" alt="">
                                    <br>
                                    <p>{{ $post->post_body }}</p>

                                  


                                    
                                @endforeach
                            @else
                                <p>No Post Available</p>
                            @endif
                        


        



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

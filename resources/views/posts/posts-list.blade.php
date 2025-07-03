<!DOCTYPE html>
<html>
    <head>
        <title>Banter Post | All Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </head>
    <style>
        .posts{
            margin-top: 3%;
            margin-inline: 5%;
        }
          .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-image{
            height: 150px;
            width: 100%;

        }
        .card-image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <body>
        <!-- <a href="{{url('/add-post')}}" class="btn btn-primary">Add Post</a>
        <hr> -->
        @include('page-components.navbar')
        <!-- <h4>Posts Shall Be Displayed Here Soon</h4>
        <hr> -->
        <div class="posts">
            <div class="row">
                @foreach($postData as $post)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-image">
                            <img src="postImages/{{$post->image}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{$post->title}}</h6>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="{{url('/read-post', $post->id)}}" class="btn btn-danger">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
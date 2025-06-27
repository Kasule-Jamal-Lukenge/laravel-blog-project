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
    </style>
    <body>
        <!-- <a href="{{url('/add-post')}}" class="btn btn-primary">Add Post</a>
        <hr> -->
        <nav class="navbar navbar-expand-lg bg-danger text-white">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#" style="margin-left:5%;">Rowdy Banter</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{url('add-post')}}">Create Post</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- <h4>Posts Shall Be Displayed Here Soon</h4>
        <hr> -->
        <div class="posts">
            <div class="row">
                @foreach($postData as $post)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img height="200px" src="postImages/{{$post->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">{{$post->title}}</h6>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="#" class="btn btn-danger">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
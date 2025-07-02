<!DOCTYPE html>
<html>
    <head>
        <title>Banter Post | Add Post</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>
    <style>
        .col-md-9{
            margin: 15px 0px 15px 0px;
        }
    </style>
    <body>
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
        <div class="row">
            <div class="col-md-9">
                <h4>{{$postToRead->title}}</h4>
                <div class="post-image">
                    <img src="/postImages/{{$postToRead->image}}" alt="">
                </div>
                <div class="post-content">
                    {{$postToRead->description}}
                </div>
            </div>
        </div>
    </body>
</html>
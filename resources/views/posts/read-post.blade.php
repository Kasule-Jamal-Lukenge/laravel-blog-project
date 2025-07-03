<!DOCTYPE html>
<html>
    <head>
        <title>Banter Post | Add Post</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>
    <style>
        .post{
            /* margin-inline: 8%; */
            background-color: #fff;
            border-radius: 4px;
        }
        .post-image{
            /* border: solid black; */
        }
        .post-image img{
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .post-content{
            margin-top: 2%;
        }
        .readMore{
            text-decoration: none;
            color: #a2a3a2;
        }
    </style>
    <body style="background-color: #f2f5f3;">
        @include('page-components.navbar');
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-9">
                    <div class="post">
                        <div class="post-content px-4 py-4">
                            <h4 class="mb-3">{{$postToRead->title}}</h4>
                            <div class="post-image">
                                <img src="/postImages/{{$postToRead->image}}" alt="">
                            </div>
                            <div class="post-content">
                                {{$postToRead->description}}
                            </div>
                            
                            @if(auth()->user())
                            <div class="comments-section pt-4">
                                <form action="{{url('/save-comment')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $postToRead->id }}">
                                    <label>Write Your Comment Here:</label>
                                    <textarea class="form-control" name="comment" rows="5" cols="10" placeholder="Tell us what is on your mind...."></textarea>
                                    <button type="submit" class="btn btn-danger w-100 mt-3">Save Comment</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Related Posts</h4>
                    @foreach($relatedPosts as $post)
                        <div class="card mb-2">
                            <img src="/postImages/{{$post->image}}" class="card-img-top" alt="{{$post->title}}" style="height: 120px; object-fit: cover;">
                            <div class="card-body">
                                <h6><a href="{{url('read-post', $post->id)}}" class="card-title text-danger readMore">{{$post->title}}</a></h6>
                                {{$post->created_at->format('d/m/Y')}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
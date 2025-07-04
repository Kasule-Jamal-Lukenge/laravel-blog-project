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
        .social-media-icon{
            height: 40px;
            width: 90px;
            border-radius: 4px;
            margin-right: 2px;
            text-decoration: none;
            color: white;
            padding: 6px;
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
                            
                            <div class="social-media mt-4">
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <!-- <p><i class="fa fa-thumbs-up"></i>&nbsp;0 Likes</p> -->
                                        <form action="{{ route('posts.like', $postToRead->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn p-0 pb-2 text-danger">
                                                <i class="fa fa-thumbs-up {{ $postToRead->isLikedBy(auth()->user()) ? 'text-danger' : '' }}"></i>
                                                &nbsp;{{ $postToRead->likes->count() }} 
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="edia " class="social-media-icon" style="background-color: #378fdb;"><i class="fab fa-facebook py-2 px-2 fa-lg"></i></a>
                                        <a href="#" class="social-media-icon" style="background-color: black;"><i class="fab fa-x-twitter py-2 px-2 fa-lg"></i></a>
                                        <a href="#" class="social-media-icon" style="background-color: #378fdb;"><i class="fab fa-telegram py-2 px-2 fa-lg"></i></a>
                                        <a href="#" class="social-media-icon" style="background-color: green;"><i class="fab fa-whatsapp py-2 px-2 fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>

                            @if(auth()->user())
                            <div class="comments-section">
                                @if($comments->count())
                                <div class="comments-list pt-4">
                                    <h5 class="mb-3">Comments ({{ $comments->count() }})</h5>
                                    @foreach($comments as $comment)
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <strong class="text-danger">{{ $comment->user->name ?? 'Unknown User' }}</strong>
                                                <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small>
                                                <p class="mt-2 mb-0">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                    @else
                                        <div class="comments-list pt-4">
                                            <h5 class="mb-3">Comments ({{ $comments->count() }})</h5>
                                            <p class="text-danger">No comments yet. Be the first to comment!</p>
                                        </div>
                                @endif
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
                    <hr>
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
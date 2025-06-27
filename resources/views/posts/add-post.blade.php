<!DOCTYPE html>
<html>
    <head>
        <title>Banter Post | Add Post</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </head>
    <style>
        .title{
            margin-top: 15px;
            margin-inline: 30px;
        }
        .form{
            margin-inline: 30px;
        }
    </style>
    <body>
        <div class="title">
            <h4>Create A New Post To Enhance Banter</h4>
            <hr>
        </div>
        <div class="form">
            <form action="{{url('/add-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label>Title:</label>
                    <input type="text"  class="form-control" name="title" placeholder="Enter A Title..."/>
                </div>

                <div class="field mt-2">
                    <label>Description:</label>
                    <textarea name="description" rows="5" cols="10" class="form-control" placeholder="Type Your Story Here...."></textarea>
                </div>

                <div class="field mt-2">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control"/>
                </div>
            
                <div class="field mt-2">
                    <button type="submit" value="addPost" class="btn btn-primary">Create Post</button>
                </div>
                
            </form>
        </div>
    </body>
</html>
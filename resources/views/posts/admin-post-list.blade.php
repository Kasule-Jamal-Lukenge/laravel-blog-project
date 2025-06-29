<!DOCTYPE html>
<html>
    <head>
        <title>Banter Post | Add Post</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>
    <style>
        .posts-table{
            margin-inline: 5%;
        }
    </style>
    <body>
        <h4>View Recent Posts Here</h4>
        <div class="posts-table">
            <table class=" table table-striped">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                    @foreach($postData as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td class="description">{{$post->description}}</td>
                        <td>
                            <a href="{{url('edit-post', $post->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{url('delete-post', $post->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </body>
    <script>
        const elements = document.querySelectorAll(".description");

        elements.forEach(element => {
            const text = element.innerText;
            const words = text.split(/\s+/);
            if (words.length > 20) {
                const trimmed = words.slice(0, 20).join(" ") + "...";
                element.innerText = trimmed;
            }
        });
    </script>

</html>
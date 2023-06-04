<h1>Create new post</h1>

<form action="{{route('posts.store')}}" method="POST">
    @csrf

    <input type="text" name="title" placeholder="post title goes here">
    <input type="text" name="body" placeholder="post body goes here">
    <button type="submit">Submit</button>

</form>

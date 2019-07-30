<table class="table table-responsive-sm mt-3">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Views</th>
        <th scope="col">Likes</th>
        <th scope="col">Dislikes</th>
        <th scope="col">Favorites</th>
        <th scope="col">Comments</th>
        <th scope="col" style="min-width: 160px;">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($videos AS $video)
        <tr>
            <th scope="row">{{ $video->id }}</th>
            <td><img class="img-fluid" src="{{ $video->thumbnail }}"></td>
            <td>{{ $video->title }}</td>
            <td>{{ $video->views }}</td>
            <td>{{ $video->likes }}</td>
            <td>{{ $video->dislikes }}</td>
            <td>{{ $video->favorite }}</td>
            <td>{{ $video->comment }}</td>
            <td>
                <a class="btn btn-sm btn-outline-info" href="/home/{{ $video->video_id }}" target="_blank">Details</a>
                <a class="btn btn-sm btn-outline-info" href="https://youtu.be/{{ $video->video_id }}" target="_blank">YouTube</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $videos->links() }}
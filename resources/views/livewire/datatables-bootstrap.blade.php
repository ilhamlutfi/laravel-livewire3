<div class="container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $index => $item)
                <tr>
                    <td>{{ $posts->firstItem() + $index }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->Category->name }}</td>
                    <td>{{ $item->User->name }}</td>
                    <td width="10%">
                        <img src="{{ asset('img/default.jpg') }}" width="100%">
                    </td>
                    <td class="text-center" width="15%">
                        <button class="btn btn-success">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <div class="float-end">
        {{ $posts->links() }}
        {{-- {{ $posts->onEachSide(0)->links() }} --}}
    </div>
</div>

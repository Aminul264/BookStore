@extends('Layout')

@section('page-content')
    <p class="text-end ">
        <a href="{{ route('books.create')}}" class="btn btn-primary">NewBook</a>
    </p>
    <table class="table table-striped table-bordered table-hover"
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Details</th>
        </tr>
        @foreach ($books as $book )
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->stock}}</td>
                <td>
                    <a href="{{ route('books.show',$book->id) }}">Details</a>
                    <form method="post" action="{{route('books.destroy',$book->id)}}" onsubmit= "return confirm('sure?')">
                    @csrf
                    @method('DELETE')
                     <input type="submit" value="Delete">
                    </form>
                </td>
                
            </tr>
        @endforeach
    </table>

    {{$books->links()}};
@endsection








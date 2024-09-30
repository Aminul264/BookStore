
@extends('Layout')

@section('page-content')


    <a href="{{ route('books.index')}}">Back</a>

    <table border="1" width="300">
        <tr>
            <th>Id</th>
            <td>{{$book->id}}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{$book->title}}</td>
        </tr>
        <tr>
            <th>Author</th>
            <td>{{$book->author}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{$book->price}}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{$book->stock}}</td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td>{{$book->isbn}}</td>
        </tr>

    </table>
</body>
</html>
@endsection
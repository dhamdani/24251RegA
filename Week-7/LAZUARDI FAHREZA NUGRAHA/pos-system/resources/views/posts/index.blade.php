@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Posts</h1>
    <a href="/posts/create" class="btn btn-primary">Create New Post</a>

    @if(session('success'))
      <div class="alert alert-success mt-3">
        {{ session('success') }}
      </div>
    @endif

    <table class="table mt-3">
      <thead>
        <tr>
          <th>Title</th>
          <th>Body</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if($posts)
          @foreach($posts as $id => $post)
            <tr>
              <td>{{ $post['title'] }}</td>
              <td>{{ $post['body'] }}</td>
              <td>
                <a href="/posts/{{ $id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/posts/{{ $id }}" method="POST" style="display: inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="3">No posts found.</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection

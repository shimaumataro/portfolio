<style>
    .thumbnail{
        width:100px;
        height:100px;
    }
</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card text-center">
            <div class="card-header">
                投稿一覧
            </div>
            @foreach($posts as $post)
            <div class="card-body">
                <h5 class="card-title">タイトル:{{$post->title}}</h5>
                <p class="card-text">内容:{{$post->body}}</p>
                <img class="thumbnail" src="/{{$post->image}}" id="image">
                <p class="card-text">投稿者:{{$post->user->name}}</p>
                <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">テスト詳細</a>
                <div class="row justify-content-center">
                    @if($post->users()->where('user_id',Auth::id())->exists())
                    <div class="col-md-3">
                        <form action="{{route('unfavorites',$post)}}" method="POST">
                            @csrf
                            <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                        </form>
                    </div>
                    @else
                    <div class="col-md-3">
                        <form action="{{route('favorites',$post)}}" method="POST">
                            @csrf
                            <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                        </form>
                    </div>
                        @endif
                    </div>
                    <div class ="row justify-content-center">
                        <p>いいね数:{{$post->users()->count()}}</p>
                    </div>
            </div>
            @endforeach
            <div class="card-footer text-muted">
                今日
            </div>
        </div>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
        </div>
    </div>
</div>
@endsection
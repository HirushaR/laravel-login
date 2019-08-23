@extends('layouts.master')

@section('content')
@include('includes.massage-block')
  <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
          <header>
              <h3>
                  What do you have to say
              </h3>
          </header>
          <form action="{{route('post.create')}}" method="post">
          <div class="form-group">
              <textarea  class="form-control" name="body" id="new-post"  rows="5" placeholder="Your post"></textarea>
              <button type="submit" class="btn btn-primary">Create Post</button>
              <input type="hidden" name="_token" value="{{Session::token()}}" >
          </div>
          </form>
      </div>
  </section>
    <section class="row posts">
        <div class="col-md 6 col-md-offset-3">
            <header><h3>What other people say..</h3></header>
            @foreach($posts as $post)
            <article class="post">
                <p>{{$post->body}}</p>
            <div class="info">
                Posted by {{$post->user->firstname }} on {{$post->created_at}}
            </div>
            <div class="interaction">
                <a href="#">like</a> |
                <a href="#">dislike</a> |
                @if(Auth::user()== $post->user)
                    <a href="#" class="first">edit</a> |
                    <a href="{{route('post.delete',['post_id'=>$post->id])}}">delete</a> |
                @endif

            </div>

            </article>
            @endforeach

        </div>
    </section>

    <div class="model fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">Close</button>
                        <h4 class="modal-title">Edit post</h4>
                </div>
                <div class="modal-body">
                    <p>One fine</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button">Save changes</button>
            </div>
        </div>
    </div>
@endsection

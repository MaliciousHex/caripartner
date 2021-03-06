@extends('layouts.master');
<style>


</style>
@section('title')
    Dashboard
@endsection

@section('content')

    @include('includes.message');
    <section class="row new-post">
            <div class="col s12 m8 offset-m2 l6 offset-l3">

                    <h1>What's your need?</h1>
                    <form action="{{route('post.create')}}" method="post">
                        {{csrf_field()}}
                        <textarea name="body" id="new-post" cols="30" rows="40"></textarea>
                        <button type="submit" class="waves-effect waves-teal btn-flat">POST</button>
                        <input type="hidden" value="{{Session::token() }}" name="_token">
                    </form>
            </div>
    </section>

    <section class="row post ">
        <h1 class="center">What's other says?</h1>
        @foreach($posts as $post)
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper" data-postid="{{$post->id}}">
                    <div class="col s2">
                        <img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s10">
                        <span class="black-text">
                           {{$post->body}}
                        </span>
                        <div class="info">
                            Posted by {{$post->users->first_name}} on {{$post->created_at}}
                        </div>
                        <div class="interaction">
                            <a href="#" class="vote">{{ Auth::user()->votes()->where('post_id', $post->id)->first() ? Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 1 ? 'You upvote this post' : 'Upvote' : 'Upvote'  }}</a>
                            <a href="#" class="vote">{{ Auth::user()->votes()->where('post_id', $post->id)->first() ? Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 0 ? 'You downvote this post' : 'Downvote' : 'Downvote'  }}</a>

                            {{--@if(Auth::user()->last_name == "Ermawan")--}}
                                {{--<script>console.log({{Auth::user()->votes()->vote}});</script>--}}
                            {{--@endif--}}

                            @if(Auth::user() == $post->users)

                                <a class="modal-trigger" href="#editModal" data-post-body="{{$post->body}}">Edit</a>
                                <a href="{{route('post.delete',['post_id' => $post->id ])}}">Delete</a>
                            @endif

                            <div id="editModal" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4>Edit Post</h4>
                                    <input type="hidden" name="postId" id="post-id">
                                    <textarea name="post-body" id="post-body" cols="0" rows="0"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button id="cancelModal" class="waves-effect waves-red darken-4 btn-flat">CANCEL</button>
                                    <button id="updateModal" type="submit" class="waves-effect waves-teal btn-flat">UPDATE</button>

                                </div>

                            </div>
                            <script>
                                var token = '{{Session::token()}}';
                                var urlEdit = '{{ route('edit') }}';
                                var urlVote = '{{ route('vote') }}';
                            </script>


                        </div>
                    </div>


                </div>

            </div>
        </div>
        @endforeach



    </section>



@endsection
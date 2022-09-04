@extends('layouts.default')
<style>
  /* *{
    border:solid 1px red;
  } */
.create{
  width:90%;
  padding:5px;
}

.input-text{
  font-size:15px;
  border:solid 1px #aaaaaa;
  border-radius:5px;
  padding:8px;
  width:80%;
}


.content__table{
  width:100%;
}

.content__table-data{
  width:35%;
}

.datetime{
  text-align:center;
}

.update-task{
  width:100%;
  }

.button-box{
  text-align: center;
  width:10%;
}

.button{
  font-size:15px;
  font-weight:600;
  color:gray;
  vertical-align: middle;
  border-radius:5px;
  background:white;
  transition    : .3s;
  word-break: normal;
}

.button__create{
  color:#ffccff;
  border:solid 2px #ffccff;
}

.button__create:hover {
  color         : #ffffff;
  background    : #ffccff;
}

.button__update{
  color:#ffc489;
  border:solid 2px #ffc489;
}

.button__update:hover {
  color         : #ffffff;
  background    : #ffc489;
}

.button__delete{
  color:#90e0ee;;
  border:solid 2px #90e0ee;
}

.button__delete:hover {
  color         : #ffffff;
  background    : #90e0ee;
}

.button__back{
  display:inline-block;
  color:gray;
  border:solid 2px gray;
  height:20px;
  padding:3px 15px ;
  text-decoration: none;
}
.button__back:hover {
  color:#ffffff;;
  background    : gray;
}

</style>


@section('title', 'タスク検索')
@section('content')


<form action="/search" method="POST">
  @csrf
  <input type="hidden" method="POST" name="user_id" value="{{$user->id}}">
  <input class="create input-text" type="text" method="POST" name="task" >
  <select name="tag_id" id="tag_id">
    <option value=""></option>
    (@foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->tag}}</option>
    @endforeach
  </select>
    <input class="button button__create" type="submit" value="検索">
</form>


  <table class=content__table>
    <tr>
      <th class="content__table-data">
        作成日
      </th>
      <th class="content__table-data">
        タスク名
      </th>
      <th>
        タグ
      </th>
      <th>
        更新
      </th>
      <th>
        削除
      </th>
    @isset($result)  
    </tr>
    @foreach($result as $task)
        <tr>
          <td class="content__table-data  datetime">
            @isset($task -> updated_at)
            {{$task -> updated_at}}
            @else
          {{$task -> created_at}}
          @endisset
          </td>
          <form action="/update/?id={{ $task->id }}" method="POST">
            @csrf 
          <td class="content__table-data">
            <input class="update-task  input-text" type="text"  name="task" value="{{$task -> task}}">
          </td>
          <td>
            <select class="content__table-tag" name="tag_id" id="tag_id">
              @foreach($tags as $tag)
                @if($tag->tag === $task->getTitle())
                  <option value="{{$tag->id}}" selected >{{$tag->tag}}</option>
                @else
                  <option value="{{$tag->id}}">{{$tag->tag}}</option>
                @endif
              @endforeach
            </select>
          </td>
          <td class="button-box">
            <input class="button button__update" type="submit" value="更新">
          </td>
          </form>
          <form action="/delete/?id={{ $task->id }}" method="POST">
          @csrf 
          <td class="button-box">
            <input class="button button__delete" type="submit" value="削除">
          </td>
          </form>
        </tr>
      @endforeach
    </table>
    @endisset
    <a href="/" class="button button__back">戻る</a>
    @endsection


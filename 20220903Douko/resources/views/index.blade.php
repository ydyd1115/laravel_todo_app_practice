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
}


.content__table{
  width:100%;
}

.content__table-data{
  width:40%;
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
  border:solid 2px #90e0ee;;
}

.button__delete:hover {
  color         : #ffffff;
  background    : #90e0ee;
}

</style>


@section('title', 'タスク検索')
@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<a href="/search">タスク検索</a></br>
<form action="/add" method="POST">
  @csrf
  <input class="create input-text" type="text" method="POST" name="task">
  <select class="button button__tag">
    @foreach($tags as $tag)
    {{$tag->tag}}
    @endforeach
  </select>
  <input class="button button__create" type="submit" value="追加">
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
        更新
      </th>
      <th>
        削除
      </th>
    </tr>
    @foreach($todos as $task)
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
  @endsection


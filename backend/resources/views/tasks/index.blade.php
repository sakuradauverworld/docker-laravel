@extends('layout')

@section('content')

<div class="container">
<form class="form-inline" action="{{route('tasks.index', ['id' => $current_folder_id])}}">
  <div class="form-group">
  <input type="text" name="keyword"  class="form-control" placeholder="タイトルを入力">
  <input type="hidden" name="folder_id" value="{{$current_folder_id}}">
  </div>
  <input type="submit" value="検索" class="btn btn-info">
</form>
  <div class="row">
    <div class="col col-md-4">
      <nav class="panel panel-default">
      <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
</div> 
<div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
</div>
        <div class="panel-heading">フォルダ</div>
        <div class="panel-body">
          <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
            フォルダを追加する
          </a>
        </div>
        <div class="list-group">
          @foreach($folders as $folder)
          <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
            {{ $folder->title }}
          </a>
          @endforeach
        </div>
      </nav>
    </div>
    <div class="column col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">タスク</div>
        <div class="panel-body">
          <div class="text-right">
            <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
              タスクを追加する
            </a>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>タイトル</th>
              <th>状態</th>
              <th>期限</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $task->title }}</td>
              <td>
                <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
              </td>
              <td>{{ $task->formatted_due_date }}</td>
              <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}" class="btn">
                  編集
                </a></td>
                <td>
                 <form method="post" action="/delete/{{$task->id}}">
                    {{ csrf_field() }}
                 <input type="submit" value="削除" class="btn">
　　　　　　　　　　</form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
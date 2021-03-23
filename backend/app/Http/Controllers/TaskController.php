<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * タスク一覧
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function index(Folder $folder,Request $request)
    {
       #キーワード受け取り
  $keyword = $request->input('keyword');
 
  #クエリ生成
  $query = Task::query();
 
  // ユーザーのフォルダを取得する
  $folders = Auth::user()->folders()->get();

  #もしキーワードがあったら
  if(!empty($keyword))
  {
    $tasks = $query->where('title','like','%'.$keyword.'%')
      ->where('folder_id',$request->folder_id)
    //   ->where('user_id',Auth::id())
      ->get();
  }else{
    // 選ばれたフォルダに紐づくタスクを取得する
    $tasks = $folder->tasks()->get();
  }
        

       

        // どのタスクがどのユーザーによって作られたか
        // タスクテーブルにユーザーIDを追加する
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder->id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * タスク作成フォーム
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function showCreateForm(Folder $folder)
    {
        return view('tasks/create', [
            'folder_id' => $folder->id,
        ]);
    }

    /**
     * タスク作成
     * @param Folder $folder
     * @param CreateTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Folder $folder, CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    /**
     * タスク編集フォーム
     * @param Folder $folder
     * @param Task $task
     * @return \Illuminate\View\View
     */
    public function showEditForm(Folder $folder, Task $task)
    {
        $this->checkRelation($folder, $task);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    /**
     * タスク編集
     * @param Folder $folder
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Folder $folder, Task $task, EditTask $request)
    {
        $this->checkRelation($folder, $task);
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }

        /**
     * タスク削除
     * @param Folder $folder
     * @param Task $task
     * @param DeleteTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
     return redirect('/');
    }

    private function checkRelation(Folder $folder, Task $task)
{
    if ($folder->id !== $task->folder_id) {
        abort(404);
    }
}
}
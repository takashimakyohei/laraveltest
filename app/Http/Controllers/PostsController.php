<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
      //ログインしているユーザー情報を取得
      $user = Auth::user();
      $posts = Post::all();
      return view('posts.index',['posts' => $posts,'user'=>$user]);
      // return view('posts.index');
    }

    public function store(Request $request)
    {
      // モデルからインスタンスを生成
      $post = new Post;
      // $requestにformからのデータが格納されているので、以下のようにそれぞれ代入する
      $post->text = $request->text;
      // userテーブルのidを、postsテーブルのuser_idとして保存する
      $post->user_id = $request->user()->id;
      // 保存
      $post->save();
      // 保存後 一覧ページへリダイレクト
      return redirect('/');
    }

    public function destroy($id)
    {
      // idを元にレコードを検索
      $post = Post::find($id);
      // 削除
      $post->delete();
      
      // 一覧にリダイレクト
      return redirect('/');
    }
}
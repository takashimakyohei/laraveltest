<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
</head>

<body>
  @auth
  <a href="/logout">ログアウト</a>
  <p>ログイン中です</p>
  <p>ユーザー名：{{$user->name}}</p>
  <p>ユーザーID：{{$user->id}}</p>
  <img src="/storage/profile_images/{{ Auth::id() }}.jpg" width="100px" height="100px">

  @endauth
  @guest
  <a href="/login">サインイン</a>
  <p>ゲストです</p>
  @endguest
  <h1>インデックスのページ</h1>
  {{-- 投稿作成 --}}
  {{-- ルートページに対してPOSTする --}}
  @auth
  <form action="/" method="post">
    {{ csrf_field() }}
    {{-- user_idはダミーの値を入れておく --}}
    {{-- <div>
      <label for="user_id">user_id</label>
      <input type="text" name="user_id" placeholder="記事のタイトルを入れる">
    </div> --}}
    <div>
      <label for="text">内容</label>
      <textarea name="text" rows="8" cols="80" placeholder="記事の内容を入れる"></textarea>
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
  @endauth



  {{-- 投稿一覧表示 --}}
  @foreach ($posts as $post)
  <h4>投稿：{{$post->text}}</h4>
  <p>投稿した人：{{$post->user_id}}</p>
  {{-- 投稿の削除 --}}
  {{-- ログインしてるユーザーと、投稿のuser_idが一緒だったら、削除ボタンを表示させる --}}
  @if(Auth::id()==$post->user_id)
  <form action="/{{$post->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">
    <input type="submit" name="" value="削除する">
  </form>
  @endif
  <hr>
  @endforeach


  {{-- ログインしている場合のみ入力フォームを表示したい --}}
</body>

</html>
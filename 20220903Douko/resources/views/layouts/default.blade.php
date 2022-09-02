<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>
    body{
      background-color:#2d0089;
    }
    
    .content{
      background-color:#ffffff;
      margin:10% auto;
      padding:1% 3% 2%;
      border-radius:10px;
      width:55%;
    }

    table th{
      font-weight:5px;
      }

    
  </style>
</head>
  <body>
    <div class="content">
      <h2>@yield('title')</h2>
      @if($user == null)
      <a href="/login">ログインしてください</a>
      @else
      <p>{{$user->name}}でログイン中</p>
      <a href="/logout">ログアウト</a>
      @endif
      <div>
        @yield('content')

      </div>
    @yield('content__table')
    </div>
</body>
</html>
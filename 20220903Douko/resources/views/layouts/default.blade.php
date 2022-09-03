<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>

    *{
      border:solid 1px red;
    
    }

    body{
      background-color:#2d0089;
    }

    .index{
      display:flex;
      justify-content:space-between;
      
    }

    .index__user__li{
      list-style:none;
      display:flex;
      justify-content:flex-end;
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
      <div class="index">
        <h2 class="index__title"> @yield('title')</h2>
        <div class="index__user">
        @if (Auth::check())
          <ul class="index__user__li">
            <li>「{{$user->name}}でログイン中</li>
            <li><a href="/logout">ログアウト</a></li>
          </ul>
          @else
          <p>ログインしてください。（<a href="/login">ログイン</a>｜
            <a href="/register">登録</a>）</p>
          @endif
        </div>    
      </div>
      <div>
          @yield('content')
      </div>
      @yi eld('content__table')
    </div>
  </body>
</html>
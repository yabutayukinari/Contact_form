<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <title>Document</title>
</head>
<body>
  <h1>管理システム</h1>
  <div class="contact-form">
    <form method="get" action="{{ url('/search') }}">
      @csrf
      <table>
        <tr>
          <th><label for="">お名前</label></th>
          <td><input type="text" name="fullname" value="{{$fullname}}"></td>
        </tr>
        <tr>
          <th>登録日</th>
            {{-- <td><input type="date" name="cleated_at" value="{{ $cleated_at['cleated_at'] }}"></td> --}}
            {{-- <td><input type="date" name="cleated_at"></td> --}}
        </tr>

        <tr>
          <th>メールアドレス</th>
          <td><input type="email" value="{{$email}}"></td>
        </tr>

        <tr>
          <th>性別※</th>
            <td>
              <label><input type="radio" name="gender" value="1" checked>全て</label>
              <label><input type="radio" name="gender" value="1" >男</label>
              <label><input type="radio" name="gender" value="2">女</label>
            </td>
        </tr>
      </table>

      <button type="submit">検索</button>
      <a href="">リセット</a>
    </form>
  </div>
  @foreach ($items as $item)
  <div>
    {{-- <article> --}}
      {{-- <p>全{{ $articles -> total() }}件中@if($articles -> firstItem() != $articles -> lastItem() ) {{$articles -> firstItem()}}件目から{{$articles -> lastItem()}}件 @else {{$articles -> firstItem()}}件 @endif</p> --}}
      {{-- <p>{{$articles -> links() }}</p><!-- ページネーション --> --}}
    
{{-- </article> --}}
      {{ $item['fullname'] }}
      {{ $item['email'] }}
  </div>
  @endforeach
</body>
</html>
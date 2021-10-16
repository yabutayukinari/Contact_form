<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <title>内容確認</title>
</head>
<body>
  <h1>内容確認</h1>
  <div class="contact-form">
    <form method="post" action="process">
      @csrf
      <table>
        <tr>
          <th>お名前※</th>
          @if(isset($inputs['lastname']))
          <td>{{ $inputs['lastname'] }} {{$inputs['firstname']}}
            </td>
          @endif
        </tr>


        <tr>
          <th>性別※</th>
            <td>
              @if ($inputs['gender'] == 1)
                  男性
              @else
                  女性
              @endif
            </td>
        </tr>

        <tr>
          <th>メールアドレス※</th>
          <td>{{$inputs['email']}}</td>
        </tr>

        <tr>
          <th><label>郵便番号※</label></th>
          <td>〒{{ $inputs['zip11'] }}</td>
        </tr>

        <tr>
          <th><label>住所※</label></th>
          <td>{{ $inputs['addr11'] }}</td>
        </tr>

        <tr>
          <th><label>建物名</label></th>
          <td>{{$inputs['building_name']}}</td>
        </tr>

        <tr>
          <th>ご意見※</th>
          <td>{{$inputs['opinion']}}</td>
        </tr>
      </table>
      <button name="action" type="submit" value="submit">送信</button>
      <a href="{{ route('return') }}">入力画面に戻る</a>
    </form>
  </div>
</body>
</html>

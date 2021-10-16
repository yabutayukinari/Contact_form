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
          <td>{{ $inputs['lastname'] }}
            <input type="hidden" name="lastname" value="{{ $inputs['lastname'] }}">
             {{$inputs['firstname']}}
             <input type="hidden" name="firstname" value="{{ $inputs['firstname'] }}">
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
            <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        </tr>

        <tr>
          <th>メールアドレス※</th>
          <td>{{$inputs['email']}}</td>
          <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        </tr>

        <tr>
          <th><label>郵便番号※</label></th>
          <td>〒{{ $inputs['zip11'] }}</td>
          <input type="hidden" name="zip11" value="{{ $inputs['zip11'] }}">
        </tr>

        <tr>
          <th><label>住所※</label></th>
          <td>{{ $inputs['addr11'] }}</td>
          <input type="hidden" name="addr11" value="{{ $inputs['addr11'] }}">
        </tr>

        <tr>
          <th><label>建物名</label></th>
          <td>{{$inputs['building_name']}}</td>
          <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">
        </tr>

        <tr>
          <th>ご意見※</th>
          <td>{{$inputs['opinion']}}</td>
          <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
        </tr>
      </table>
      <button name="action" type="submit" value="submit">送信</button>
      <button name="action" type="submit" value="return">入力画面に戻る</button>
    </form>
  </div>
</body>
</html>
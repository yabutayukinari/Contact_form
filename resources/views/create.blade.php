<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <title>お問い合わせ</title>
</head>
<body>
  <h1>お問い合わせ</h1>
  <div class="contact-form">
    <form method="post" action="confirm">
      @csrf
      <table>
        <tr>
          <th>お名前※</th>
          <td><input type="text" name="lastname" value="{{ old('lastname') }}" /></td>
          <td><input type="text" name="firstname" value="{{ old('firstname') }}" /></td>
        </tr>
        <tr>
          <th></th>
          <td>　例）山田</td>
          <td>　太郎</td>
        </tr>
        <tr>
          <th></th>
          <td>
            @if ($errors->has('lastname'))
             <p class="alert alert-danger">{{ $errors->first('lastname') }}</p>
            @endif
          </td>
          <td>
            @if ($errors->has('firstname'))
             <p class="alert alert-danger">{{ $errors->first('firstname') }}</p>
            @endif
          </td>

        </tr>

        <tr>
          <th>性別※</th>
            <td>
              <label><input type="radio" name="gender" value="1" checked {{ old('like','1') == '1' ? 'checked' : '' }}>男</label>
              <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女</label>
            </td>
        </tr>
        <tr>
          <th></th>
          <td>
            @if ($errors->has('gender'))
             <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
            @endif
          </td>
        </tr>
        <tr>
          <th>メールアドレス※</th>
          <td><input type="email" name="email" value="{{ old('email') }}" /></td>
        </tr>
        <tr>
          <th></th>
          <td>　例）test@example.com</td>
        </tr>
        <tr>
          <th></th>
          <td>
            @if ($errors->has('email'))
             <p class="alert alert-danger">{{ $errors->first('email') }}</p>
            @endif
          </td>
        </tr>

        <tr>
          <th><label>郵便番号※</label></th>
          <td>〒<input id="foo" value="{{ old('zip11')}}" type="text" name="zip11" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');"></td>
        </tr>
        <script>
          var zen2han = function(e) {
            var v, old = e.value;
              return function(){
              if( old != ( v = e.value ) ){
                  old = v;
                  var str = $(this).val();
                  str = str.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
                  return String.fromCharCode(s.charCodeAt(0) - 65248);
               });
                $(this).val(str);
              }
              }
            };
            $(function(){
            $("#foo").each(function(){
            $(this).bind('keyup', zen2han(this));
          });
          });
        </script>

        <tr>
          <th></th>
          <td>　例）123-4567</td>
        </tr>

        <tr>
          <th></th>
          <td>
            @if ($errors->has('zip11'))
             <p class="alert alert-danger">{{ $errors->first('zip11') }}</p>
            @endif
          </td>
        </tr>

        <tr>
          <th><label>住所※</label></th>
          <td><input value="{{ old('addr11')}}" type="text" name="addr11" size="60" name="address"></td>
        </tr>

        <tr>
          <th></th>
          <td>　例）東京都渋谷区千駄ヶ谷1-2-3</td>
        </tr>

         <tr>
          <th></th>
          <td>
            @if ($errors->has('addr11'))
             <p class="alert alert-danger">{{ $errors->first('addr11') }}</p>
            @endif
          </td>
        </tr>
        <tr>
          <th><label>建物名</label></th>
          <td><input type="text" name="building_name" value="{{ old('building_name') }}" /></td>
        </tr>
        <tr>
          <th></th>
          <td>　例）千駄ヶ谷マンション101</td>
        </tr>

        <tr>
          <th>ご意見※</th>
          <td><textarea name="opinion">{{ old('opinion') }}</textarea></td>
        </tr>
         <tr>
          <th></th>
          <td>
            @if ($errors->has('opinion'))
             <p class="alert alert-danger">{{ $errors->first('opinion') }}</p>
            @endif
          </td>
        </tr>
      </table>
      <button type="submit">確認</button>
    </form>
  </div>
</body>
</html>
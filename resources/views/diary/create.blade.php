<form method="post" action="{{ route('diary.store') }}">
  @csrf
<!-- テキストボックスの記載例 -->
<div>
  <label for="title">タイトル：</label>
  <input type="text" id="title" name="title">
</div>

<!-- テキストエリアの記載例 -->
<div>
  <label for="body">本文：</label>
  <textarea id="body" name="body" rows="4" cols="40"></textarea>
</div>

<div>
    <button type="submit">保存</button>
  </div>
</form>
<!-- 戻るボタンを追加 -->
<a href="{{ route('diary.index') }}">戻る</a>

<!-- 更新したことを通知 -->
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<!-- タイトルを H1 タグで表示する -->
<h1>{{ $diary->title }}</h1>

<!-- 内容と日付を表示する -->
<div>
  <div>{{ $diary->body }}</div>
  <div>{{ $diary->date }}</div>
</div>

<!-- 編集ボタンを表示する -->
<a href="{{ route('diary.edit', $diary) }}">編集</a>

<!-- 削除ボタンを表示する -->
<form method="post" action="{{ route('diary.destroy', $diary->id) }}">
  @csrf
  @method('delete')
  <button>削除</button>
</form>


<form method="post" action="{{ route('diary.update', $diary->id) }}">
  @csrf
  @method('patch')
  <div>
    <label for="title">タイトル</label>
    <input name="title" id="title" type="text" value="{{ old('title', $diary->title) }}" />
  </div>
  <div>
    <label for="body">内容</label>
    <textarea name="body" id="body" cols="30" rows="10">{{ old('body', $diary->body) }}</textarea>
  </div>
  <div>
    <button type="submit">更新する</button>
  </div>
</form>
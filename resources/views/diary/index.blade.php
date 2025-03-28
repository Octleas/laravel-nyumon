<html>
<head>
    <title>Diary</title>
</head>
<body>

<!-- 作成したことを通知 -->
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<a href="{{ route('diary.create') }}">新規作成</a>
<h1>日記一覧</h1>
@foreach($diaries as $diary)
<div>
    <div>{{ $diary->date }}</div>
    <div>
        <a href="{{ route('diary.show', $diary) }}">{{ $diary->title }}</a>
    </div>
    </div>
@endforeach
</body>
</html>

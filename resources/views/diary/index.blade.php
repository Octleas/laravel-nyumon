<html>
<head>
    <title>Diary</title>
</head>
<body>
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

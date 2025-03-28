<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    // 日記の一覧を表示
    public function index() {
        $diaries = Diary::all();
        return view('diary.index', compact('diaries'));
    }

    // 日記の新規作成フォームを表示
    public function create() {
        return view('diary.create');
    }

    // 日記の保存
    public function store(Request $request) {
        $title = $request->input('title');
        $body = $request->input('body');
        $date = $request->input('date');
        // バリデーション
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        // データベースに保存
        $diary = new Diary();
        $diary->title = $validated['title'];
        $diary->body = $validated['body'];
        $diary->date = date('Y-m-d');

        $diary->save();
        return back()->with('message', '保存しました');
    }

    // 日記の詳細を表示
    public function show($id) {
        $diary = Diary::find($id);
        if (!$diary) {
            return redirect()->route('diary.index')->with('error', '日記が見つかりません');
        }
        return view('diary.show', compact('diary'));
    }

    // 日記の編集フォームを表示
    public function edit($id) {
        $diary = Diary::find($id);
        if (!$diary) {
            return redirect()->route('diary.index')->with('error', '日記が見つかりません');
        }
        return view('diary.update', compact('diary'));
    }

    // 日記の更新
    public function update(Request $request, $id) {
        // 更新対象となるデータを取得する
        $diary = Diary::find($id);

        // 入力値チェックを行う
        // タイトルは20文字以内、本文は400文字以内という制限を設ける
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        // チェック済みの値を使用して更新処理を行う
        $diary->update($validated);

        // 更新後、日記詳細ページにリダイレクトし、成功メッセージを表示
        return redirect()->route('diary.show', ['id' => $id])
            ->with('message', '更新しました');
    }

    // 日記の削除
    public function destroy(Request $request) {
        // IDを受け取る（引数で受け取る他に、下記の書き方もできます）
        $id = $request->route('id');
      
        // 削除対象となるデータを取得する
        $diary = Diary::find($id);
      
        // 削除する
        $diary->delete();
        
        // 記事一覧画面に戻る
        return redirect()->route('diary.index');
      }
}
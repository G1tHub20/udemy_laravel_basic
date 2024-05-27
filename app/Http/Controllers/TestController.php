<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// モデルを読み込む
use App\Models\Test;
// DBファサードを読み込む
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        // DBテーブルから全件取得（エロクアント）
        $values = Test::all();

        $count = Test::count();

        $first = Test::findOrFail(1);
        // 条件指定（textの値が'bbb'） 
        $whereBBB = Test::where('text', '=', 'bbb')->get();


        //クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=','bbb')
        ->select('id','text')
        ->get();


        // 変数の内容を表示し、スクリプトの実行を停止
        dd($values, $count, $first, $whereBBB, $queryBuilder);

        // ヘルパ関数（フォルダ名.ファイル名）でViewファイルを表示
        // return view('tests.test');

        // compact関数でデータを渡す
        return view('tests.test', compact('values'));
    }
}

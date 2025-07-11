<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class LocaleController extends Controller
{
    //
    public function setLocale($locale)
    {
        // セッションにロケールを保存
        session(['app_locale' => $locale]);

        // リダイレクト先を指定（例: 前のページに戻る）
        return redirect()->back();
    }
}

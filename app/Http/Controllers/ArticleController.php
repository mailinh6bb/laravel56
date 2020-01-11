<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ArticleController extends  FrontendController
{
	public function getArticle (){
		$article = Article::paginate(10);
		$articleHot = Article::orderBy('a_view','DESC')->take(5)->get();
		return view('article.index', compact('article', 'articleHot'));
	}
	public function getDetailArticle (Request $request, $id){
		$url = $request->segment(2);
		$url = preg_split('/(-)/i', $url);
		if ($id = array_pop($url)) {
			$article = Article::find($id);
			$a_view =  Article::find($id)->increment('a_view'); // tang tong luot xem và trong db ko đc null
			$articleNew = Article::orderBy('id', 'DESC')->take(5)->get();
			$comment = Comment::where('idArticle', $id)-> orderBy('id', 'DESC') ->limit(5) -> get();
			$reply = ReplyComment::where('rep_article_id', $id)-> orderBy('id', 'DESC')-> get();
			$viewData = [
				'article' => $article,
				'articleNew' => $articleNew,
				'comment' => $comment,
				'reply' => $reply
			];

			return view('article.detail', $viewData);
		}
		return redirect()->route('/');
	}

}

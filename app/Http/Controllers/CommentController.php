<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CommentController extends Controller
{
    public function deleteComment(string $id) {
        // $comments = Comment::where('id',$id)->delete(); // кол-во удалённых комментариев // ОСТАНОВИЛСЯ ТУТ - ПОМЕНЯТЬ ТО ЧТО НАДО ПОМЕНЯТЬ
        //$deletedComments = Comment::onlyTrashed()->where('id',$id)->get(); тут пыталось взять ком-нт на удаление из уже удаленных
        $deletedComments = Comment::withTrashed()->where('id',$id)->get(); //with чтобы показывать все ком-рии. может захочется его удалить прям полностью
        $poem_id = $deletedComments[0]->poem_id;
        $comments = Comment::where('id',$id)->delete();
        return redirect()->route('poems', ['id'=>$poem_id]);
    }

    public function showTrashedComments() {
        $comments = Comment::onlyTrashed()->get();
        return view('comment.admin.trashed', ['comments'=>$comments]);
    }

    public function restoreComment(string $id) {
        $toBeRestoredComment = Comment::withTrashed()->where('id',$id)->get(); //он даёт удалённые комментарии в виде массива
        $poem_id = $toBeRestoredComment[0]->poem_id;
        $comments = Comment::where('id',$id)->restore(); // restore даёт кол-во id
        //return redirect()->route('/poems/{poem_id}'); // вернет на стих с которого удалили коммент
        return redirect()->route('poems', ['id'=>$poem_id]); // тут нужно возвращаться на стих с которого удалили коммент
    }

    /*public function poem_Action(string $poem_id) {
        $poem = Poem::find($poem_id);
        if (is_null($poem)) {
            $poem = new Poem();
            $poem->release_date=date('Y-m-d H-i-s');
            $poem->save();
        }
        return view('left', ['poem'=>$poem->getAttributes()]);
    }

    public function poem_postAction(Request $request) {

        $validated = $request->validate([ // валидацию потом сделать
            'title'=>['max:100'],
            'author_id'=>['numeric', 'exists:user,id'],
            'publisher_id'=>['numeric', 'exists:user,id'],
            'release_date'=>['numeric'], // не нюмерик
            'release_year'=>['required', 'numeric', 'min:4'],
            'content'=>[''],
            'storyline'=>[''],
            // photo status бла бла..
        ]);
        $validated = $request->all();

        $poem = new Poem();
        $poem->fill($validated); // в поем модели сделать переменную fillable и туда занести те поля которые должен заполнять пользователь
        $poem->save();
    }*/

    public function getComment(string $new='') {
        $comment = Poem::find($new);
        if (is_null($new)) {
            $new = new Comment();
        }
        return view('comment.form', ['comment'=>$comment]); // вернет на стих с которого удалили коммент
    }

    public function postComment(Request $request) { // в реквесте данные стиха poem's data всё, что угодно
        $validated = $request->validate([ // валидацию потом сделать
            'content'=>['required', 'max:300']
        ]);

        $comment = new Comment();
        $comment->fill($validated);
        $comment->save();

        return redirect()->route('poems', ['id'=>$comment->poem_id]); // вернет на стих с которого удалили коммент
    }
}

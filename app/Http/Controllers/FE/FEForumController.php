<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\FE\ForumComment;
use App\Models\FE\ForumPost;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Log;

class FEForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = ForumPost::with(['user'])->orderBy('created_at', 'DESC');
        $items = $query->paginate(config('constants.items_per_page'));
        return view('fe.forum', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fe.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        try{
            $user = Auth::user();
            $data = $request->all();
            // $dom = new \DomDocument();
            // $dom->loadHtml(mb_convert_encoding($data['content'], 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            // $html = $dom->appendChild(
            //     $dom->createElementNS('http://www.w3.org/1999/xhtml', 'h:html')
            // );
            // $html->appendChild($dom->createElementNS('http://www.w3.org/1999/xhtml', 'h:head'));
            // $data['content'] = $dom->saveHTML();
            $data['user_id'] = $user->id;
            $post = new ForumPost();
            $post->fill($data);
            $post->save();
            Session::flash('success', 'Đăng bài viết thành công!');
            return redirect()->route('forum.show', $post->id);
        }catch(Exception $e){
            Log::error('FEForumController|store|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $post = ForumPost::findOrFail($id);
            $query = ForumComment::where('forum_post_id', $post->id)->orderBy('created_at', 'asc');
            $comments = $query->paginate(config('constants.items_per_page'));
            return view('fe.show-post', compact('post', 'comments'));
        }catch(Exception $e){
            Log::error('FEForumController|store|' . $e->getMessage() . $e->getTraceAsString());
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $post = ForumPost::findOrFail($id);
            $post->delete();
            Session::flash('success', 'Xóa thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEForumController|destroy|' . $e->getMessage() . $e->getTraceAsString());
            return redirect()->route('home');
        }
    }

    public function createComment(CreateCommentRequest $request, $post_id){
        try{
            $data = $request->all();
            $user = Auth::user();
            $data['forum_post_id'] = $post_id;
            $data['user_id'] = $user->id;
            $comment = new ForumComment();
            $comment->fill($data);
            $comment->save();
            Session::flash('success', 'Gửi bình luận thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEForumController|createComment|' . $e->getMessage() . $e->getTraceAsString());
            return redirect()->route('home');
        }
    }

    public function commentDestroy($id)
    {
        try{
            $comment = ForumComment::findOrFail($id);
            $comment->delete();
            Session::flash('success', 'Xóa thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEForumController|commentDestroy|' . $e->getMessage() . $e->getTraceAsString());
            return redirect()->route('home');
        }
    }
}

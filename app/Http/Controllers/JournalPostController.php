<?php

namespace App\Http\Controllers;

use App\Models\JournalPost;
use Illuminate\Http\Request;

class JournalPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function list()
    {
        // Show all journal posts
        $journalPosts = JournalPost::all();

        return view('list', ['posts' => $journalPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', JournalPost::class);

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', JournalPost::class);
        // Store a new journal post

        $journalPost = JournalPost::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('journal.show', ['postId' => $journalPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\JournalPost $journalPost
     *
     * @return \Illuminate\Http\Response
     */
    public function show(JournalPost $postId)
    {
        return view('show', ['post' => $postId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\JournalPost $journalPost
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(JournalPost $journalPost)
    {
        $this->authorize('update', $journalPost);
        // Show the form to edit a journal post
        return view('edit', ['post' => $journalPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JournalPost  $journalPost
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JournalPost $journalPost)
    {
        $this->authorize('update', $journalPost);
        // Update a journal post
        $journalPost->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('journal.show', ['postId' => $journalPost->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\JournalPost $journalPost
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(JournalPost $journalPost)
    {
        $this->authorize('delete', $journalPost);
        $journalPost->delete();

        return redirect()->route('dashboard.posts');
    }
}

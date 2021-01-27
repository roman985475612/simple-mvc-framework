<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $this->view('pages/index', [
            'title' => 'welcome',
            'posts' => $posts
        ]);
    }

    public function about()
    {
        $this->view('pages/about', ['title' => 'about us']);
    }
}
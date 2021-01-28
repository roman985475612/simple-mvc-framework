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
            'title' => 'Welcome',
            'description' => 'The jumbotron component is removed in favor of utility classes like .bg-light for the background color and .p-* classes to control padding.',
            'posts' => $posts
        ]);
    }

    public function about()
    {
        $this->view('pages/about', [
            'title' => 'About Us',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'    
        ]);
    }
}
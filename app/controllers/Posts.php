<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!isAuthenticated()) {
            return redirect('users/login');
        }
        
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->all();
        $this->view('posts/index', compact('posts'));
    }
    
    public function show($id)
    {
        $post = $this->postModel->get($id);
        $this->view('posts/show', compact('post'));
    }
    
    public function add()
    {
        $data = [
            'page' => [
                'title'       => 'Add Post',
                'description' => 'Create a post with this form',
                'action'      => URLROOT . '/posts/add',
                'back_link'   => URLROOT . '/posts/index',
            ],
            'title'     => '',
            'body'      => '',
            'title_err' => '',
            'body_err'  => '',
        ];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data['title'] = trim($_POST['title']);
            $data['body']  = trim($_POST['body']);
            
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            } else {
                if ($post = $this->postModel->add($data)) {
                    flash('success', '<strong>Success!</strong> You are added new post!');
                    return redirect('posts/index');                    
                } else {
                    flash('danger', '<strong>Error!</strong> Something went wrong!');
                }
            }
        }
        
        $this->view('posts/form', $data);
    }

    public function edit($id)
    {
        $post = $this->postModel->get($id);
        
        if ($post->user_id !== $_SESSION['user_id']) {
            return redirect('posts');
        }
        
        $data = [
            'page' => [
                'title'       => 'Edit Post',
                'description' => 'Edit a post with this form',
                'action'      => URLROOT . '/posts/edit/' . $post->id,
                'back_link'   => URLROOT . '/posts/show/' . $post->id,
            ],
            'id'        => $post->id,
            'title'     => $post->title,
            'body'      => $post->body,
            'title_err' => '',
            'body_err'  => '',
        ];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data['title'] = trim($_POST['title']);
            $data['body']  = trim($_POST['body']);
            
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            } else {
                if ($post = $this->postModel->update($data)) {
                    flash('success', '<strong>Success!</strong> You are updated a post!');
                    return redirect('posts/index');                    
                } else {
                    flash('danger', '<strong>Error!</strong> Something went wrong!');
                }
            }
        }
        
        $this->view('posts/form', $data);
    }
    
    public function delete($id)
    {
        $post = $this->postModel->get($id);
        if ($post->user_id !== $_SESSION['user_id']) {
            return redirect('posts');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postModel->delete($id);
            flash('success', '<strong>Success!</strong> Post remove!');
        }
        return redirect('posts/index');                    
    }
}
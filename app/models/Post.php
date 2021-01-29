<?php

class Post
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Db;
    }

    public function all()
    {
        $sql = QueryBuilder::select([
                                'posts.id', 
                                'posts.title', 
                                'posts.body', 
                                'posts.created_at AS post_created_at',
                                'users.name',
                            ])
                           ->from('posts')
                           ->join('users')
                           ->on('posts.user_id', 'users.id')
                           ->orderBy('posts.created_at')
                           ->getQuery();
                           
        $this->db->query($sql);
        return $this->db->resultSet();
    }
    
    public function get($id)
    {
        $sql = QueryBuilder::select([
                                'posts.id', 
                                'posts.title', 
                                'posts.body', 
                                'posts.user_id', 
                                'posts.created_at AS post_created_at',
                                'users.name',
                            ])
                           ->from('posts')
                           ->join('users')
                           ->on('posts.user_id', 'users.id')
                           ->on('posts.id', ':id')
                           ->getQuery();

        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function add($data)
    {
        $sql = QueryBuilder::insert('posts', ['title', 'body', 'user_id']);
        
        $this->db->query($sql);
        $this->db->bind(':title'  , $data['title']);
        $this->db->bind(':body'   , $data['body']);
        $this->db->bind(':user_id', $_SESSION['user_id']);

        return $this->db->execute();
    }
    
    public function update($data)
    {
        $sql = QueryBuilder::update('posts', ['title', 'body']);
        $this->db->query($sql);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body' , $data['body']);
        $this->db->bind(':id'   , $data['id']);

        return $this->db->execute();
    }
    
    public function delete($id)
    {
        $sql = QueryBuilder::delete('posts');
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
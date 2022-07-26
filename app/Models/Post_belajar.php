<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
private static $blog_post = [
    [
    "title" => "Judul Post1",
    "slug" => "judul-post1",
    "author" => "Roni",
    "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.BLABLA"
    ],
    [
    "title" => "Judul Post2",
    "slug" => "judul-post2",
    "author" => "Roy",
    "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus neque veritatis et at cupiditate, voluptates, voluptas suscipit ut vitae, similique quisquam porro earum eius quidem consectetur distinctio animi. Sunt.12313131 1312313 BLA"
    ]
    ];

    public static function all(){
        // return self::$blog_post; //property static (menggunakan array biasa)
        // return $this => blog_post; //property biasa
        return collect(self::$blog_post); //property static (menggunakan collecion)
    }

    public static function find($slug){
        // $posts = self::$blog_post; //self untuk property static
        $posts = static::all(); //static untk methode static menggunakan collection fungsi all

        return $posts->firstWhere('slug', $slug); //ketika slug = $slug (menggantikan array di bawah)

        //tidak dp perlukan karena menggunakan collection
        // $post = [];
        // foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //     $post = $p;
        //     }
        // }
        // return $post;
    }

}
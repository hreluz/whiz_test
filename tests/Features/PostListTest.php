<?php

class PostListTest extends FeatureTestCase
{
    public function test_can_see_the_posts_list()
    {
        $title1 = 'Este es un post de prueba';
    	$title2 = 'Este es otro post de prueba';

    	$post1 = $this->createPost([
    		'title' => $title1
    	]);

        $post2 = $this->createPost([
            'title' => $title2
        ]);

    	$this->visit(route('posts.index')) 
            ->seeInElement('td', $title1)
    		->seeInElement('td', $title2)
            ->see($title1)
    		->see($title2);
    }
}

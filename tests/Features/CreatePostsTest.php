<?php
use App\Post;

class CreatePostsTest extends FeatureTestCase
{
	public function test_create_a_post()
	{
		//Having
		$title = 'Estes es el titulo';
		$content = 'Este es el contenido';

		$data = [
			'title' => $title,
			'content' => $content
		];

		//When
        $response = $this->json('POST', route('api.posts.create'), $data, ['api-key' => $this->getKey() ]);

        //Expect
        $response->seeStatusCode(200)
         		->seeJson([
	                'result' => true,
        			'message' => 'Post was created succesfully',
	            ]);

        //Then
		$this->seeInDatabase('posts',[
			'title' => $title,
			'content' => $content
		]);

	}

	public function test_create_post_validation()
	{
		//When
        $response = $this->json('POST', route('api.posts.create'), [], ['api-key' => $this->getKey() ]);
        $errors = $response->decodeResponseJson();

		$expected_errors = [
        	'title' => [
        		'The title field is required.',
        	],
        	'content' => [
        		'The content field is required.',
        	]
        ];
        
		$this->assertTrue($expected_errors == $errors);
	}

}

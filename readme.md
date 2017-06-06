<p align="center"><img src="http://whiz.pe/assets/images/logo.png"></p>

## About This Api


This an api test for Whiz company. 
This api allows you to create post and see them in the website

## What do I need to make it work ? 

For Creating a Post, you just need  a POST method with the api-key(in the header or content), with a title and content to this route 

>> http://159.203.139.1/api/posts/create

So your request should look like this

```
{
  "title" : "This is a title",
  "content": "This is a content",
  "api-key": "The key"
}
```

If you would like to see your posts, just check this link

<a href="http://159.203.139.1/" target="_blank">  http://159.203.139.1/ </a>


## Additional Info

This api was created with TDD, so if you want you could run the tests just with __phpunit__ , and change whatever you want 

See you !

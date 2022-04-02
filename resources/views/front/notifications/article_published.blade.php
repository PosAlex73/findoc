<p>{{ $item->data['text'] }}</p>
<a href="{{ route('front.blog.article', ['article' => $item->data['article_id']]) }}"></a>
<hr>

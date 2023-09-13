<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url('/')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    @foreach ($posts as $post)
        <url>
            <loc>{{url('articol/' . $post->category->slug . '/' . $post->slug)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($post->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

    @foreach ($categories as $category)
    <url>
        <loc>{{url('categorie/' . $category->slug)}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($category->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
@php('<?xml version="1.0" encoding="UTF-8"?>')
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://elkhartraids.website/</loc>
        <lastmod>2018-12-06T20:59:23+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://elkhartraids.website/raids</loc>
        <lastmod>2018-12-06T20:59:23+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://elkhartraids.website/quests</loc>
        <lastmod>2018-12-06T20:59:23+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://elkhartraids.website/gyms</loc>
        <lastmod>2018-12-06T20:59:23+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://elkhartraids.website/pokestops</loc>
        <lastmod>2018-12-06T20:59:23+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @php($gyms = \App\Gym::all())

    @foreach($gyms as $gym)
    <url>
        <loc>https://elkhartraids.website/raids/{{$gym->gym_id}}</loc>
        <lastmod>@php($date = new DateTime($gym->last_scanned))@php($date = $date->format('Y-m-d')){{ $date }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    @endforeach

    @php($stops = \App\Quest::all())
    @foreach($stops as $stop)
    <url>
        <loc>https://elkhartraids.website/quests/{{$stop->pokestop_id}}</loc>
        <lastmod>@php($date = new DateTime($stop->last_scanned))@php($date = $date->format('Y-m-d')){{$date}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

</urlset>

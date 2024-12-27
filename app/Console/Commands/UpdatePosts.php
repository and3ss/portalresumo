<?php

namespace App\Console\Commands;

use App\Models\Portal;
use App\Services\ChromeDriverFactory;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class UpdatePosts extends Command
{
    protected $signature = 'app:update-posts';

    protected $description = 'Update posts';

    public function handle()
    {
        $chromeDriverFactory = new ChromeDriverFactory();
        $browser = $chromeDriverFactory->browser;
        $portals = Portal::all();
        foreach ($portals as $portal) {
            $this->info("Updating posts from {$portal->name}");
            $browser->visit($portal->url)
                ->waitFor('a[cmp-ltrk="Home Editoria - Destaques"]');
            $posts = $browser
                ->script(
                    'const links = [];
                    const anchors = document.querySelectorAll("a[cmp-ltrk=\'Home Editoria - Destaques\']");
                    anchors.forEach(anchor => {
                        const href = anchor.href;
                        const ul = Array.from(anchor.querySelectorAll("span")).map(row => row.textContent.trim());
                        links.push({ href, ul });
                    });
                    return links;'
                );
            if (empty($posts)) {
                $this->error("No posts found");
                continue;
            }
            $posts = $posts[0];
            $this->info("Found " . count($posts) . " posts");
            Arr::map($posts, function ($post) use ($portal) {
                $portal->posts()->updateOrCreate(
                    ['url' => $post['href']],
                    [
                        'title' => $post['ul'][0] ?? '',
                        'content' => $post['ul'][1] ?? '',
                    ]
                );
            });
            $this->info("Posts updated");
        }
    }
}

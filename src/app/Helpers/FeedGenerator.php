<?php


namespace App\Helpers;

use App\Models\Show;
use DateTime;
use DOMDocument;
use Illuminate\Support\Carbon;

class FeedGenerator
{
    /** @var Show */
    private Show $shows;

    public function __construct(Show $shows)
    {
        $this->shows = $shows;
    }

    private function generate()
    {
        // Create the DOM
        $dom = new DOMDocument("1.0", "utf-8");

        // Create the <rss>
        $rss = $dom->createElement("rss");
        $rss->setAttribute("xmlns:itunes", "http://www.itunes.com/dtds/podcast-1.0.dtd");
        $rss->setAttribute("version", "2.0");
        $dom->appendChild($rss);

        // Create the <channel>
        $channel = $dom->createElement("channel");
        $rss->appendChild($channel);

        // Create the <title>
        $title = $dom->createElement("title", $this->shows->title);
        $channel->appendChild($title);

        // Create the <link>
        $link = $dom->createElement("link", $this->shows->link);
        $channel->appendChild($link);

        // Create the <description>
        $description = $dom->createElement("description");
        $description->appendChild($dom->createCDATASection($this->description));
        $channel->appendChild($description);

        // Create the <itunes:summary>
        $itune_summary = $dom->createElement("itunes:summary", $this->shows->description);
        $channel->appendChild($itune_summary);

        // Create the <image>
        $image = $dom->createElement("image");
        $image->appendChild($title->cloneNode(true));
        $image->appendChild($link->cloneNode(true));
        $channel->appendChild($image);
        $image_url = $dom->createElement("url", $this->shows->image);
        $image->appendChild($image_url);

        // Create the <itunes:image>
        $image = $dom->createElement("itunes:image");
        $image->setAttribute("href", $this->shows->image);
        $channel->appendChild($image);

        // Create the <itunes:author>
        $author = $dom->createElement("itunes:author", $this->shows->show->author);
        $channel->appendChild($author);

        // Create the <itunes:owner>
        $owner = $dom->createElement("itunes:owner");
        $owner_name = $dom->createElement("itunes:name", $this->shows->show->author);
        $owner->appendChild($owner_name);
        if ($this->shows->show->email_owner != null) {
            $owner_email = $dom->createElement("itunes:email", $this->shows->show->email_owner);
            $owner->appendChild($owner_email);
        }
        $channel->appendChild($owner);

        // Create the <itunes:category>
        if ($this->shows->show->category !== null) {
            $category = $dom->createElement("itunes:category", $this->shows->show->category);
            $channel->appendChild($category);
        }

        // Create the <language>
        if ($this->language !== null) {
            $language = $dom->createElement("language", $this->shows->language);
            $channel->appendChild($language);
        }

        // Create the <copyright>
        if ($this->copyright !== null) {
            $copyright = $dom->createElement("copyright", $this->shows->copyright);
            $channel->appendChild($copyright);
        }

        // Create the <items>
        foreach ($this->media as $media) {
            // Addition of media in the dom
            $media->addToDom($dom);

            // Get the latest date media for <pubDate>
            if ($this->pubDate == null) {
                $this->pubDate = $media->getPubDate();
            } else {
                if ($this->pubDate < $media->getPubDate()) {
                    $this->pubDate = $media->getPubDate();
                }
            }
        }

        // Create the <pubDate>
        if ($this->pubDate == null) {
            $this->pubDate = Carbon::parse($this->shows->show->created_at)->format(DateTime::RFC822);
        }
        $pubDate = $dom->createElement("pubDate", $this->shows->pubDate->format(DateTime::RFC822));
        $channel->appendChild($pubDate);

        // Return the DOM
        return $dom;
    }
}

<?php

namespace App\Helpers;

use App\Models\Episode;
use App\Models\Show;
use DateTime;
use DOMDocument;
use Illuminate\Support\Carbon;

class FeedGenerator
{
    /** @var Show */
    private Show $show;

    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    public function generate(): DOMDocument
    {
        $pubDate = null;

        $dom = new DOMDocument("1.0", "utf-8");

        $rss = $dom->createElement("rss");
        $rss->setAttribute("xmlns:itunes", "http://www.itunes.com/dtds/podcast-1.0.dtd");
        $rss->setAttribute("version", "2.0");
        $dom->appendChild($rss);

        $channel = $dom->createElement("channel");
        $rss->appendChild($channel);

        $title = $dom->createElement("title", $this->show->title);
        $channel->appendChild($title);

        $link = $dom->createElement("link", '$this->show->link');
        $channel->appendChild($link);

        $description = $dom->createElement("description");
        $description->appendChild($dom->createCDATASection($this->show->description));
        $channel->appendChild($description);

        $itune_summary = $dom->createElement("itunes:summary", $this->show->description);
        $channel->appendChild($itune_summary);

        $image = $dom->createElement("image");
        $image->appendChild($title->cloneNode(true));
        $image->appendChild($link->cloneNode(true));
        $channel->appendChild($image);
        $image_url = $dom->createElement("url", $this->show->artwork);
        $image->appendChild($image_url);

        $image = $dom->createElement("itunes:image");
        $image->setAttribute("href", $this->show->artwork);
        $channel->appendChild($image);

        $author = $dom->createElement("itunes:author", $this->show->author);
        $channel->appendChild($author);

        $owner = $dom->createElement("itunes:owner");
        $owner_name = $dom->createElement("itunes:name", $this->show->author);
        $owner->appendChild($owner_name);
        if ($this->show->email_owner != null) {
            $owner_email = $dom->createElement("itunes:email", $this->show->email_owner);
            $owner->appendChild($owner_email);
        }
        $channel->appendChild($owner);

        if ($this->show->category !== null) {
            $category = $dom->createElement("itunes:category", $this->show->category);
            $channel->appendChild($category);
        }

        if ($this->show->language !== null) {
            $language = $dom->createElement("language", $this->show->language);
            $channel->appendChild($language);
        }

        if ($this->show->copyright !== null) {
            $copyright = $dom->createElement("copyright", $this->show->copyright);
            $channel->appendChild($copyright);
        }

        foreach ($this->show->episodes as $episode) {
            $item = $this->addEpisode($episode, $dom);
            $channel->appendChild($item);
        }

        if ($pubDate == null) {
            $pubDate = $dom->createElement("pubDate", Carbon::parse($this->show->created_at)->format(DateTime::RFC822));
        }
        $channel->appendChild($pubDate);

        return $dom;
    }

    private function addEpisode(Episode $episode, DOMDocument $dom)
    {
        $item = $dom->createElement("item");

        $title = $dom->createElement("title", $episode->title);
        $item->appendChild($title);

        $link = $dom->createElement("link", '$episode->link');
        $item->appendChild($link);

        $description = $dom->createElement("description");
        $description->appendChild($dom->createCDATASection($episode->content));
        $item->appendChild($description);

        $guid = $dom->createElement("guid", 'asdasd');
        $item->appendChild($guid);

        $itunesImage = $dom->createElement("itunes:image");
        $itunesImage->setAttribute("href", $episode->cover);
        $item->appendChild($itunesImage);

        $itunesTitle = $dom->createElement("itunes:title", $episode->title);
        $item->appendChild($itunesTitle);

        $summary = $dom->createElement("itunes:summary");
        $summary->appendChild($dom->createCDATASection($episode->content));
        $item->appendChild($summary);

        $enclosure = $dom->createElement("enclosure");
        $enclosure->setAttribute("url", $episode->audioFile->link);
        $enclosure->setAttribute("type", 'audio/mpeg');
        $item->appendChild($enclosure);

        $itunesExplicit = $dom->createElement("itunes:explicit", $episode->explicit);
        $item->appendChild($itunesExplicit);

        $itunesEpisode = $dom->createElement("itunes:episode", $episode->episode);
        $item->appendChild($itunesEpisode);

        $itunesSeason = $dom->createElement("itunes:season", $episode->season);
        $item->appendChild($itunesSeason);

        $itunesEpisodeType = $dom->createElement("itunes:episodeType", $episode->episode_type);
        $item->appendChild($itunesEpisodeType);

        $pubDate = $dom->createElement("pubDate", Carbon::parse($episode->created_at)->format(DateTime::RFC822));
        $item->appendChild($pubDate);

        return $item;
    }
}

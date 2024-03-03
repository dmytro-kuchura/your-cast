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
        $dom = new DOMDocument('1.0', 'utf-8');

        $rss = $dom->createElement('rss');
        $rss->setAttribute('xmlns:itunes', 'http://www.itunes.com/dtds/podcast-1.0.dtd');
        $rss->setAttribute('xmlns:media', 'http://search.yahoo.com/mrss/');
        $rss->setAttribute('xmlns:dcterms', 'http://purl.org/dc/terms/');
        $rss->setAttribute('xmlns:spotify', 'http://www.spotify.com/ns/rss');
        $rss->setAttribute('xmlns:psc', 'http://podlove.org/simple-chapters/');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        $title = $dom->createElement('title', $this->show->title);
        $channel->appendChild($title);

        $link = $dom->createElement('link', $this->show->link);
        $channel->appendChild($link);

        $description = $dom->createElement('description');
        $description->appendChild($dom->createCDATASection($this->show->description));
        $channel->appendChild($description);

        $itune_summary = $dom->createElement('itunes:summary', $this->show->description);
        $channel->appendChild($itune_summary);

        $generator = $dom->createElement('generator', 'Your Cast');
        $channel->appendChild($generator);

        $image = $dom->createElement('image');
        $image->appendChild($title->cloneNode(true));
        $image->appendChild($link->cloneNode(true));
        $channel->appendChild($image);

        $image_url = $dom->createElement('url', $this->show->artwork);
        $image->appendChild($image_url);

        $image = $dom->createElement('itunes:image');
        $image->setAttribute('href', $this->show->artwork);
        $channel->appendChild($image);

        $author = $dom->createElement('itunes:author', $this->show->author);
        $channel->appendChild($author);

        $explicit = $dom->createElement('itunes:explicit', $this->show->explicit ? 'yes' : 'no');
        $channel->appendChild($explicit);

        $owner = $dom->createElement('itunes:owner');
        $owner_name = $dom->createElement('itunes:name', $this->show->author);
        $owner->appendChild($owner_name);
        if ($this->show->email_owner != null) {
            $owner_email = $dom->createElement('itunes:email', $this->show->email_owner);
            $owner->appendChild($owner_email);
        }
        $channel->appendChild($owner);

        if ($this->show->category !== null) {
            $category = $dom->createElement('itunes:category');
            $category->setAttribute('text', 'Sport');
            $subCategory = $dom->createElement('itunes:category');
            $subCategory->setAttribute('text', 'Football');
            $category->appendChild($subCategory);
            $channel->appendChild($category);
        }

        if ($this->show->language !== null) {
            $language = $dom->createElement('language', $this->show->language);
            $channel->appendChild($language);
        }

        if ($this->show->copyright !== null) {
            $copyright = $dom->createElement('copyright', $this->show->copyright);
            $channel->appendChild($copyright);
        }

        foreach ($this->show->episodes as $episode) {
            $item = $this->addEpisode($episode, $dom);
            $channel->appendChild($item);
        }

        $countryOfOrigin= $dom->createElement('spotify:countryOfOrigin', 'ua');
        $channel->appendChild($countryOfOrigin);

        return $dom;
    }

    private function addEpisode(Episode $episode, DOMDocument $dom)
    {
        $item = $dom->createElement('item');

        $guid = $dom->createElement('guid');
        $guid->setAttribute('isPermaLink', $episode->show->token . '-' . $episode->show->id . '-' . $episode->id);
        $item->appendChild($guid);

        $enclosure = $dom->createElement('enclosure');
        $enclosure->setAttribute('url', 'https://your-cast.com/audio/' . $episode->audioFile->audioFileLink->token);
        $enclosure->setAttribute('type', 'audio/mpeg');
        $enclosure->setAttribute('length', $episode->audioFile->size * 1000);
        $item->appendChild($enclosure);

        $pubDate = $dom->createElement('pubDate', Carbon::parse($episode->created_at)->format(DateTime::RFC822));
        $item->appendChild($pubDate);

        $title = $dom->createElement('title', $episode->title);
        $item->appendChild($title);

        $mediaTitle = $dom->createElement('media:title', $episode->title);
        $item->appendChild($mediaTitle);

        $link = $dom->createElement('link', $episode->link);
        $item->appendChild($link);

        $description = $dom->createElement('description');
        $description->appendChild($dom->createCDATASection($episode->content));
        $item->appendChild($description);

        $mediaDescription = $dom->createElement('media:description', $episode->content);
        $item->appendChild($mediaDescription);

        $itunesOrder = $dom->createElement('itunes:order', $episode->episode);
        $item->appendChild($itunesOrder);

        $itunesExplicit = $dom->createElement('itunes:explicit', $this->show->explicit ? 'yes' : 'no');
        $item->appendChild($itunesExplicit);

        $itunesImage = $dom->createElement('itunes:image');
        $itunesImage->setAttribute('href', $episode->cover);
        $item->appendChild($itunesImage);

        $itunesEpisodeType = $dom->createElement('itunes:episodeType', $episode->episode_type);
        $item->appendChild($itunesEpisodeType);

        $itunesTitle = $dom->createElement('itunes:title', $episode->title);
        $item->appendChild($itunesTitle);

        $summary = $dom->createElement('itunes:summary');
        $summary->appendChild($dom->createCDATASection($episode->content));
        $item->appendChild($summary);

        $itunesEpisode = $dom->createElement('itunes:episode', $episode->episode);
        $item->appendChild($itunesEpisode);

        $itunesSeason = $dom->createElement('itunes:season', $episode->season);
        $item->appendChild($itunesSeason);

        return $item;
    }
}

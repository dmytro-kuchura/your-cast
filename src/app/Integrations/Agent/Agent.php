<?php

namespace App\Integrations\Agent;

class Agent
{
    protected static array $platforms = [
        'ios',
        'android',
        'macos',
        'windows',
        'ubuntu'
    ];

    protected static array $operatingSystems = [
        'windows' => 'Windows',
        'macos' => 'Mac OS X',
        'ubuntu' => 'Ubuntu',
        'android' => 'Android',
        'ios' => '\biPhone.*Mobile|\biPod|\biPad|AppleCoreMedia'
    ];

    protected string $matchingRegex = '';

    protected array $matchesArray = [];

    protected function findPlatform(array $rules, $userAgent = null): bool|string
    {
        foreach ($rules as $key => $regex) {
            if (empty($regex)) {
                continue;
            }
            if ($this->match($regex, $userAgent)) {
                return $key ?: reset($this->matchesArray);
            }
        }
        return false;
    }

    public function match(string $regex, string $userAgent): bool
    {
        $match = (bool)preg_match(sprintf('#%s#is', $regex), $userAgent, $matches);
        if ($match) {
            $this->matchingRegex = $regex;
            $this->matchesArray = $matches;
        }
        return $match;
    }

    public function platform($userAgent = null): bool|string
    {
        $platform = $this->findPlatform(static::$operatingSystems, $userAgent);
        if (in_array($platform, static::$platforms)) {
            return $platform;
        }
        return 'other';
    }
}

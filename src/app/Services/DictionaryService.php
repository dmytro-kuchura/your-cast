<?php

namespace App\Services;

use App\Repositories\DictionaryCategoriesRepository;
use App\Repositories\DictionaryLanguagesRepository;
use App\Repositories\DictionaryTimezonesRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class DictionaryService
{
    /** @var DictionaryCategoriesRepository */
    private DictionaryCategoriesRepository $categoriesRepository;

    /** @var DictionaryLanguagesRepository */
    private DictionaryLanguagesRepository $languagesRepository;

    /** @var DictionaryTimezonesRepository */
    private DictionaryTimezonesRepository $timezonesRepository;

    public function __construct(
        DictionaryCategoriesRepository $categoriesRepository,
        DictionaryLanguagesRepository  $languagesRepository,
        DictionaryTimezonesRepository  $timezonesRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->languagesRepository = $languagesRepository;
        $this->timezonesRepository = $timezonesRepository;
    }

    public function getTimezones(): Collection|array
    {
        return Cache::remember('timezones', now()->addMinutes(150), function () {
            return $this->timezonesRepository->all();
        });
    }

    public function getLanguages(): Collection|array
    {
        return Cache::remember('languages', now()->addMinutes(150), function () {
            return $this->languagesRepository->all();
        });
    }

    public function getCategories(): Collection|array
    {
        return Cache::remember('categories', now()->addMinutes(150), function () {
            return $this->categoriesRepository->all();
        });
    }
}

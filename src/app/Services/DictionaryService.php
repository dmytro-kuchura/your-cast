<?php

namespace App\Services;

use App\Repositories\DictionaryCategoriesRepository;
use App\Repositories\DictionaryLanguagesRepository;
use App\Repositories\DictionaryTimezonesRepository;
use Illuminate\Database\Eloquent\Collection;

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
        DictionaryLanguagesRepository $languagesRepository,
        DictionaryTimezonesRepository $timezonesRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->languagesRepository = $languagesRepository;
        $this->timezonesRepository = $timezonesRepository;
    }

    public function getTimezones(): Collection|array
    {
        return $this->timezonesRepository->all();
    }

    public function getLanguages(): Collection|array
    {
        return $this->languagesRepository->all();
    }
}

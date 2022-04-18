<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDataIntoCategoriesDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->getData() as $value) {
            DB::table('dictionary_categories')->insert(['code' => $value['value'], 'value' => $value['name'], 'parent_id' => 0]);

            if (isset($value['children'])) {
                $parentId = DB::table('dictionary_categories')->select('id')->where('code', '=', $value['value'])->first();
                foreach ($value['children'] as $children) {
                    DB::table('dictionary_categories')->insert(['code' => $children['value'], 'value' => $children['name'], 'parent_id' => $parentId->id]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('dictionary_categories')->truncate();
    }

    private function getData(): array
    {
        return [
            [
                "value" => "arts",
                "name" => "Arts",
                "children" => [
                    [
                        "value" => "books",
                        "name" => "Books"
                    ],
                    [
                        "value" => "design",
                        "name" => "Design"
                    ],
                    [
                        "value" => "fashion_and_beauty",
                        "name" => "Fashion and beauty"
                    ],
                    [
                        "value" => "food",
                        "name" => "Food"
                    ],
                    [
                        "value" => "performing_arts",
                        "name" => "Performing arts"
                    ],
                    [
                        "value" => "visual_arts",
                        "name" => "Visual arts"
                    ]
                ]
            ],
            [
                "value" => "business",
                "name" => "Business",
                "children" => [
                    [
                        "value" => "careers",
                        "name" => "Careers"
                    ],
                    [
                        "value" => "entrepreneurship",
                        "name" => "Entrepreneurship"
                    ],
                    [
                        "value" => "investing",
                        "name" => "Investing"
                    ],
                    [
                        "value" => "management",
                        "name" => "Management"
                    ],
                    [
                        "value" => "marketing",
                        "name" => "Marketing"
                    ],
                    [
                        "value" => "non_profit",
                        "name" => "Non profit"
                    ]
                ]
            ],
            [
                "value" => "comedy",
                "name" => "Comedy",
                "children" => [
                    [
                        "value" => "comedy_interviews",
                        "name" => "Comedy interviews"
                    ],

                    [
                        "value" => "stand_up",
                        "name" => "Stand up"
                    ]
                ]
            ],
            [
                "value" => "education",
                "name" => "Education",
                "children" => [
                    [
                        "value" => "courses",
                        "name" => "Courses"
                    ],
                    [
                        "value" => "how_to",
                        "name" => "How to"
                    ],
                    [
                        "value" => "language_learning",
                        "name" => "Language learning"
                    ],
                    [
                        "value" => "self_improvement",
                        "name" => "Self improvement"
                    ]
                ]
            ],
            [
                "value" => "fiction",
                "name" => "Fiction",
                "children" => [
                    [
                        "value" => "courses",
                        "name" => "Courses"
                    ],
                    [
                        "value" => "how_to",
                        "name" => "How to"
                    ],
                    [
                        "value" => "language_learning",
                        "name" => "Language learning"
                    ],
                    [
                        "value" => "self_improvement",
                        "name" => "Self improvement"
                    ]
                ]
            ],
            [
                "value" => "government",
                "name" => "Government"
            ],
            [
                "value" => "health_and_fitness",
                "name" => "Health and fitness",
                "children" => [
                    [
                        "value" => "alternative_health",
                        "name" => "Alternative health"
                    ],
                    [
                        "value" => "fitness",
                        "name" => "Fitness"
                    ],
                    [
                        "value" => "medicine",
                        "name" => "Medicine"
                    ],
                    [
                        "value" => "mental_health",
                        "name" => "Mental health"
                    ],
                    [
                        "value" => "nutrition",
                        "name" => "Nutrition"
                    ],
                    [
                        "value" => "sexuality",
                        "name" => "Sexuality"
                    ]
                ]
            ],
            [
                "value" => "history",
                "name" => "History"
            ],
            [
                "value" => "kids_and_family",
                "name" => "Kids and family",
                "children" => [
                    [
                        "value" => "education_for_kids",
                        "name" => "Education for kids"
                    ],
                    [
                        "value" => "parenting",
                        "name" => "Parenting"
                    ],
                    [
                        "value" => "pets_and_animals",
                        "name" => "Pets and animals"
                    ],
                    [
                        "value" => "stories_for_kids",
                        "name" => "Stories for kids"
                    ]
                ]
            ],
            [
                "value" => "leisure",
                "name" => "Leisure",
                "children" => [
                    [
                        "value" => "animation_and_manga",
                        "name" => "Animation and manga"
                    ],
                    [
                        "value" => "automotive",
                        "name" => "Automotive"
                    ],
                    [
                        "value" => "aviation",
                        "name" => "Aviation"
                    ],
                    [
                        "value" => "crafts",
                        "name" => "Crafts"
                    ],
                    [
                        "value" => "games",
                        "name" => "Games"
                    ],
                    [
                        "value" => "hobbies",
                        "name" => "Hobbies"
                    ],
                    [
                        "value" => "home_and_garden",
                        "name" => "Home and garden"
                    ],
                    [
                        "value" => "other_games",
                        "name" => "Other games"
                    ],
                    [
                        "value" => "video_games",
                        "name" => "Video games"
                    ]
                ]
            ],
            [
                "value" => "music",
                "name" => "Music",
                "children" => [
                    [
                        "value" => "music_commentary",
                        "name" => "Music commentary"
                    ],
                    [
                        "value" => "music_history",
                        "name" => "Music history"
                    ],
                    [
                        "value" => "music_interviews",
                        "name" => "Music interviews"
                    ]
                ]
            ],
            [
                "value" => "news",
                "name" => "News",
                "children" => [
                    [
                        "value" => "business_news",
                        "name" => "Business news"
                    ],
                    [
                        "value" => "daily_news",
                        "name" => "Daily news"
                    ],
                    [
                        "value" => "entertainment_news",
                        "name" => "Entertainment news"
                    ],
                    [
                        "value" => "news_commentary",
                        "name" => "News commentary"
                    ],
                    [
                        "value" => "politics",
                        "name" => "Politics"
                    ],
                    [
                        "value" => "sports_news",
                        "name" => "Sports news"
                    ],
                    [
                        "value" => "tech_news",
                        "name" => "Tech news"
                    ]
                ]
            ],
            [
                "value" => "religion_and_spirituality",
                "name" => "Religion and spirituality",
                "children" => [
                    [
                        "value" => "buddhism",
                        "name" => "Buddhism"
                    ],
                    [
                        "value" => "christianity",
                        "name" => "Christianity"
                    ],
                    [
                        "value" => "hinduism",
                        "name" => "Hinduism"
                    ],
                    [
                        "value" => "islam",
                        "name" => "Islam"
                    ],
                    [
                        "value" => "judaism",
                        "name" => "Judaism"
                    ],
                    [
                        "value" => "religion",
                        "name" => "Religion"
                    ],
                    [
                        "value" => "spirituality",
                        "name" => "Spirituality"
                    ]
                ]
            ],
            [
                "value" => "science",
                "name" => "Science",
                "children" => [
                    [
                        "value" => "astronomy",
                        "name" => "Astronomy"
                    ],
                    [
                        "value" => "chemistry",
                        "name" => "Chemistry"
                    ],
                    [
                        "value" => "earth_sciences",
                        "name" => "Earth sciences"
                    ],
                    [
                        "value" => "life_sciences",
                        "name" => "Life sciences"
                    ],
                    [
                        "value" => "mathematics",
                        "name" => "Mathematics"
                    ],
                    [
                        "value" => "nature",
                        "name" => "Nature"
                    ],
                    [
                        "value" => "natural_sciences",
                        "name" => "Natural_sciences"
                    ],
                    [
                        "value" => "physics",
                        "name" => "Physics"
                    ],
                    [
                        "value" => "social_sciences",
                        "name" => "Social sciences"
                    ]
                ]
            ],
            [
                "value" => "society_and_culture",
                "name" => "Society and culture",
                "children" => [
                    [
                        "value" => "documentary",
                        "name" => "Documentary"
                    ],
                    [
                        "value" => "personal_journals",
                        "name" => "Personal journals"
                    ],
                    [
                        "value" => "philosophy",
                        "name" => "Philosophy"
                    ],
                    [
                        "value" => "places_and_travel",
                        "name" => "Places and travel"
                    ],
                    [
                        "value" => "relationships",
                        "name" => "Relationships"
                    ]
                ]
            ],
            [
                "value" => "sports",
                "name" => "Sports",
                "children" => [
                    [
                        "value" => "baseball",
                        "name" => "Baseball"
                    ],
                    [
                        "value" => "basketball",
                        "name" => "Basketball"
                    ],
                    [
                        "value" => "cricket",
                        "name" => "Cricket"
                    ],
                    [
                        "value" => "fantasy_sports",
                        "name" => "Fantasy sports"
                    ],
                    [
                        "value" => "football",
                        "name" => "Football"
                    ],
                    [
                        "value" => "golf",
                        "name" => "Golf"
                    ],
                    [
                        "value" => "hockey",
                        "name" => "Hockey"
                    ],
                    [
                        "value" => "rugby",
                        "name" => "Rugby"
                    ],
                    [
                        "value" => "running",
                        "name" => "Running"
                    ],
                    [
                        "value" => "soccer",
                        "name" => "Soccer"
                    ],
                    [
                        "value" => "swimming",
                        "name" => "Swimming"
                    ],
                    [
                        "value" => "tennis",
                        "name" => "Tennis"
                    ],
                    [
                        "value" => "volleyball",
                        "name" => "Volleyball"
                    ],
                    [
                        "value" => "wrestling",
                        "name" => "Wrestling"
                    ]
                ]
            ],
            [
                "value" => "tv_and_film",
                "name" => "Tv and Film",
                "children" => [
                    [
                        "value" => "after_shows",
                        "name" => "After shows"
                    ],
                    [
                        "value" => "film_history",
                        "name" => "Film history"
                    ],
                    [
                        "value" => "film_interviews",
                        "name" => "Film interviews"
                    ],
                    [
                        "value" => "film_reviews",
                        "name" => "Film reviews"
                    ],
                    [
                        "value" => "tv_reviews",
                        "name" => "TV reviews"
                    ]
                ]
            ],
            [
                "value" => "technology",
                "name" => "Technology"
            ],
            [
                "value" => "true_crime",
                "name" => "True crime"
            ]
        ];

    }
}

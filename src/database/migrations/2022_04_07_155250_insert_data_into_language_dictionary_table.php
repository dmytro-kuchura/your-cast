<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDataIntoLanguageDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->getData() as $key => $value) {
            DB::table('dictionary_languages')->insert($value);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('dictionary_languages')->truncate();
    }

    private function getData(): array
    {
        return [
            [
                "value" => "Afar",
                "code" => "aa"
            ],
            [
                "value" => "Abkhazian",
                "code" => "ab"
            ],
            [
                "value" => "Afrikaans",
                "code" => "af"
            ],
            [
                "value" => "Akan",
                "code" => "ak"
            ],
            [
                "value" => "Amharic",
                "code" => "am"
            ],
            [
                "value" => "Aragonese",
                "code" => "an"
            ],
            [
                "value" => "Arabic",
                "code" => "ar"
            ],
            [
                "value" => "Assamese",
                "code" => "as"
            ],
            [
                "value" => "Avar",
                "code" => "av"
            ],
            [
                "value" => "Aymara",
                "code" => "ay"
            ],
            [
                "value" => "Azerbaijani",
                "code" => "az"
            ],
            [
                "value" => "Bashkir",
                "code" => "ba"
            ],
            [
                "value" => "Belarusian",
                "code" => "be"
            ],
            [
                "value" => "Bulgarian",
                "code" => "bg"
            ],
            [
                "value" => "Bihari",
                "code" => "bh"
            ],
            [
                "value" => "Bislama",
                "code" => "bi"
            ],
            [
                "value" => "Bambara",
                "code" => "bm"
            ],
            [
                "value" => "Bengali",
                "code" => "bn"
            ],
            [
                "value" => "Tibetan",
                "code" => "bo"
            ],
            [
                "value" => "Breton",
                "code" => "br"
            ],
            [
                "value" => "Bosnian",
                "code" => "bs"
            ],
            [
                "value" => "Catalan",
                "code" => "ca"
            ],
            [
                "value" => "Chechen",
                "code" => "ce"
            ],
            [
                "value" => "Chamorro",
                "code" => "ch"
            ],
            [
                "value" => "Corsican",
                "code" => "co"
            ],
            [
                "value" => "Cree",
                "code" => "cr"
            ],
            [
                "value" => "Czech",
                "code" => "cs"
            ],
            [
                "value" => "Old Church Slavonic / Old Bulgarian",
                "code" => "cu"
            ],
            [
                "value" => "Chuvash",
                "code" => "cv"
            ],
            [
                "value" => "Welsh",
                "code" => "cy"
            ],
            [
                "value" => "Danish",
                "code" => "da"
            ],
            [
                "value" => "German",
                "code" => "de"
            ],
            [
                "value" => "Divehi",
                "code" => "dv"
            ],
            [
                "value" => "Dzongkha",
                "code" => "dz"
            ],
            [
                "value" => "Ewe",
                "code" => "ee"
            ],
            [
                "value" => "Greek",
                "code" => "el"
            ],
            [
                "value" => "English",
                "code" => "en"
            ],
            [
                "value" => "Esperanto",
                "code" => "eo"
            ],
            [
                "value" => "Spanish",
                "code" => "es"
            ],
            [
                "value" => "Estonian",
                "code" => "et"
            ],
            [
                "value" => "Basque",
                "code" => "eu"
            ],
            [
                "value" => "Persian",
                "code" => "fa"
            ],
            [
                "value" => "Peul",
                "code" => "ff"
            ],
            [
                "value" => "Finnish",
                "code" => "fi"
            ],
            [
                "value" => "Fijian",
                "code" => "fj"
            ],
            [
                "value" => "Faroese",
                "code" => "fo"
            ],
            [
                "value" => "French",
                "code" => "fr"
            ],
            [
                "value" => "West Frisian",
                "code" => "fy"
            ],
            [
                "value" => "Irish",
                "code" => "ga"
            ],
            [
                "value" => "Scottish Gaelic",
                "code" => "gd"
            ],
            [
                "value" => "Galician",
                "code" => "gl"
            ],
            [
                "value" => "Guarani",
                "code" => "gn"
            ],
            [
                "value" => "Gujarati",
                "code" => "gu"
            ],
            [
                "value" => "Manx",
                "code" => "gv"
            ],
            [
                "value" => "Hausa",
                "code" => "ha"
            ],
            [
                "value" => "Hebrew",
                "code" => "he"
            ],
            [
                "value" => "Hindi",
                "code" => "hi"
            ],
            [
                "value" => "Hiri Motu",
                "code" => "ho"
            ],
            [
                "value" => "Croatian",
                "code" => "hr"
            ],
            [
                "value" => "Haitian",
                "code" => "ht"
            ],
            [
                "value" => "Hungarian",
                "code" => "hu"
            ],
            [
                "value" => "Armenian",
                "code" => "hy"
            ],
            [
                "value" => "Herero",
                "code" => "hz"
            ],
            [
                "value" => "Interlingua",
                "code" => "ia"
            ],
            [
                "value" => "Indonesian",
                "code" => "id"
            ],
            [
                "value" => "Interlingue",
                "code" => "ie"
            ],
            [
                "value" => "Igbo",
                "code" => "ig"
            ],
            [
                "value" => "Sichuan Yi",
                "code" => "ii"
            ],
            [
                "value" => "Inupiak",
                "code" => "ik"
            ],
            [
                "value" => "Ido",
                "code" => "io"
            ],
            [
                "value" => "Icelandic",
                "code" => "is"
            ],
            [
                "value" => "Italian",
                "code" => "it"
            ],
            [
                "value" => "Inuktitut",
                "code" => "iu"
            ],
            [
                "value" => "Japanese",
                "code" => "ja"
            ],
            [
                "value" => "Javanese",
                "code" => "jv"
            ],
            [
                "value" => "Georgian",
                "code" => "ka"
            ],
            [
                "value" => "Kongo",
                "code" => "kg"
            ],
            [
                "value" => "Kikuyu",
                "code" => "ki"
            ],
            [
                "value" => "Kuanyama",
                "code" => "kj"
            ],
            [
                "value" => "Kazakh",
                "code" => "kk"
            ],
            [
                "value" => "Greenlandic",
                "code" => "kl"
            ],
            [
                "value" => "Cambodian",
                "code" => "km"
            ],
            [
                "value" => "Kannada",
                "code" => "kn"
            ],
            [
                "value" => "Korean",
                "code" => "ko"
            ],
            [
                "value" => "Kanuri",
                "code" => "kr"
            ],
            [
                "value" => "Kashmiri",
                "code" => "ks"
            ],
            [
                "value" => "Kurdish",
                "code" => "ku"
            ],
            [
                "value" => "Komi",
                "code" => "kv"
            ],
            [
                "value" => "Cornish",
                "code" => "kw"
            ],
            [
                "value" => "Kirghiz",
                "code" => "ky"
            ],
            [
                "value" => "Latin",
                "code" => "la"
            ],
            [
                "value" => "Luxembourgish",
                "code" => "lb"
            ],
            [
                "value" => "Ganda",
                "code" => "lg"
            ],
            [
                "value" => "Limburgian",
                "code" => "li"
            ],
            [
                "value" => "Lingala",
                "code" => "ln"
            ],
            [
                "value" => "Laotian",
                "code" => "lo"
            ],
            [
                "value" => "Lithuanian",
                "code" => "lt"
            ],
            [
                "value" => "Latvian",
                "code" => "lv"
            ],
            [
                "value" => "Malagasy",
                "code" => "mg"
            ],
            [
                "value" => "Marshallese",
                "code" => "mh"
            ],
            [
                "value" => "Maori",
                "code" => "mi"
            ],
            [
                "value" => "Macedonian",
                "code" => "mk"
            ],
            [
                "value" => "Malayalam",
                "code" => "ml"
            ],
            [
                "value" => "Mongolian",
                "code" => "mn"
            ],
            [
                "value" => "Moldovan",
                "code" => "mo"
            ],
            [
                "value" => "Marathi",
                "code" => "mr"
            ],
            [
                "value" => "Malay",
                "code" => "ms"
            ],
            [
                "value" => "Maltese",
                "code" => "mt"
            ],
            [
                "value" => "Burmese",
                "code" => "my"
            ],
            [
                "value" => "Nauruan",
                "code" => "na"
            ],
            [
                "value" => "North Ndebele",
                "code" => "nd"
            ],
            [
                "value" => "Nepali",
                "code" => "ne"
            ],
            [
                "value" => "Ndonga",
                "code" => "ng"
            ],
            [
                "value" => "Dutch",
                "code" => "nl"
            ],
            [
                "value" => "Norwegian Nynorsk",
                "code" => "nn"
            ],
            [
                "value" => "Norwegian",
                "code" => "no"
            ],
            [
                "value" => "South Ndebele",
                "code" => "nr"
            ],
            [
                "value" => "Navajo",
                "code" => "nv"
            ],
            [
                "value" => "Chichewa",
                "code" => "ny"
            ],
            [
                "value" => "Occitan",
                "code" => "oc"
            ],
            [
                "value" => "Ojibwa",
                "code" => "oj"
            ],
            [
                "value" => "Oromo",
                "code" => "om"
            ],
            [
                "value" => "Oriya",
                "code" => "or"
            ],
            [
                "value" => "Ossetian",
                "code" => "os"
            ],
            [
                "value" => "Punjabi",
                "code" => "pa"
            ],
            [
                "value" => "Pali",
                "code" => "pi"
            ],
            [
                "value" => "Polish",
                "code" => "pl"
            ],
            [
                "value" => "Pashto",
                "code" => "ps"
            ],
            [
                "value" => "Portuguese",
                "code" => "pt"
            ],
            [
                "value" => "Quechua",
                "code" => "qu"
            ],
            [
                "value" => "Raeto Romance",
                "code" => "rm"
            ],
            [
                "value" => "Kirundi",
                "code" => "rn"
            ],
            [
                "value" => "Romanian",
                "code" => "ro"
            ],
            [
                "value" => "Russian",
                "code" => "ru"
            ],
            [
                "value" => "Rwandi",
                "code" => "rw"
            ],
            [
                "value" => "Sanskrit",
                "code" => "sa"
            ],
            [
                "value" => "Sardinian",
                "code" => "sc"
            ],
            [
                "value" => "Sindhi",
                "code" => "sd"
            ],
            [
                "value" => "Sango",
                "code" => "sg"
            ],
            [
                "value" => "Serbo-Croatian",
                "code" => "sh"
            ],
            [
                "value" => "Sinhalese",
                "code" => "si"
            ],
            [
                "value" => "Slovak",
                "code" => "sk"
            ],
            [
                "value" => "Slovenian",
                "code" => "sl"
            ],
            [
                "value" => "Samoan",
                "code" => "sm"
            ],
            [
                "value" => "Shona",
                "code" => "sn"
            ],
            [
                "value" => "Somalia",
                "code" => "so"
            ],
            [
                "value" => "Albanian",
                "code" => "sq"
            ],
            [
                "value" => "Serbian",
                "code" => "sr"
            ],
            [
                "value" => "Swati",
                "code" => "ss"
            ],
            [
                "value" => "Southern Sotho",
                "code" => "st"
            ],
            [
                "value" => "Sundanese",
                "code" => "su"
            ],
            [
                "value" => "Swedish",
                "code" => "sv"
            ],
            [
                "value" => "Swahili",
                "code" => "sw"
            ],
            [
                "value" => "Tamil",
                "code" => "ta"
            ],
            [
                "value" => "Telugu",
                "code" => "te"
            ],
            [
                "value" => "Tajik",
                "code" => "tg"
            ],
            [
                "value" => "Thai",
                "code" => "th"
            ],
            [
                "value" => "Tigrinya",
                "code" => "ti"
            ],
            [
                "value" => "Turkmen",
                "code" => "tk"
            ],
            [
                "value" => "Tagalog",
                "code" => "tl"
            ],
            [
                "value" => "Tswana",
                "code" => "tn"
            ],
            [
                "value" => "Tonga",
                "code" => "to"
            ],
            [
                "value" => "Turkish",
                "code" => "tr"
            ],
            [
                "value" => "Tsonga",
                "code" => "ts"
            ],
            [
                "value" => "Tatar",
                "code" => "tt"
            ],
            [
                "value" => "Twi",
                "code" => "tw"
            ],
            [
                "value" => "Tahitian",
                "code" => "ty"
            ],
            [
                "value" => "Uyghur",
                "code" => "ug"
            ],
            [
                "value" => "Ukrainian",
                "code" => "uk"
            ],
            [
                "value" => "Urdu",
                "code" => "ur"
            ],
            [
                "value" => "Venda",
                "code" => "ve"
            ],
            [
                "value" => "Vietvaluese",
                "code" => "vi"
            ],
            [
                "value" => "Volapük",
                "code" => "vo"
            ],
            [
                "value" => "Walloon",
                "code" => "wa"
            ],
            [
                "value" => "Wolof",
                "code" => "wo"
            ],
            [
                "value" => "Xhosa",
                "code" => "xh"
            ],
            [
                "value" => "Yiddish",
                "code" => "yi"
            ],
            [
                "value" => "Yoruba",
                "code" => "yo"
            ],
            [
                "value" => "Zhuang",
                "code" => "za"
            ],
            [
                "value" => "Chinese",
                "code" => "zh"
            ],
            [
                "value" => "Zulu",
                "code" => "zu"
            ]
        ];
    }
}

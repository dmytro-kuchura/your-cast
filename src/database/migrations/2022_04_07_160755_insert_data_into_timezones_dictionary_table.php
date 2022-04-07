<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDataIntoTimezonesDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->getData() as $key => $value) {
            DB::table('dictionary_timezones')->insert($value);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('dictionary_timezones')->truncate();
    }

    private function getData(): array
    {
        return [
            [
                "code" => "Pacific/Niue",
                "value" => "(GMT-11:00) Niue"
            ],
            [
                "code" => "Pacific/Pago_Pago",
                "value" => "(GMT-11:00) Pago Pago"
            ],
            [
                "code" => "Pacific/Honolulu",
                "value" => "(GMT-10:00) Hawaii"
            ],
            [
                "code" => "Pacific/Rarotonga",
                "value" => "(GMT-10:00) Rarotonga"
            ],
            [
                "code" => "Pacific/Tahiti",
                "value" => "(GMT-10:00) Tahiti"
            ],
            [
                "code" => "Pacific/Marquesas",
                "value" => "(GMT-09 =>30) Marquesas"
            ],
            [
                "code" => "America/Anchorage",
                "value" => "(GMT-09:00) Alaska"
            ],
            [
                "code" => "Pacific/Gambier",
                "value" => "(GMT-09:00) Gambier"
            ],
            [
                "code" => "America/Los_Angeles",
                "value" => "(GMT-08:00) Los Angeles"
            ],
            [
                "code" => "America/Tijuana",
                "value" => "(GMT-08:00) Tijuana"
            ],
            [
                "code" => "America/Vancouver",
                "value" => "(GMT-08:00) Vancouver"
            ],
            [
                "code" => "America/Whitehorse",
                "value" => "(GMT-08:00) Whitehorse"
            ],
            [
                "code" => "Pacific/Pitcairn",
                "value" => "(GMT-08:00) Pitcairn"
            ],
            [
                "code" => "America/Dawson_Creek",
                "value" => "(GMT-07:00) Dawson Creek"
            ],
            [
                "code" => "America/Denver",
                "value" => "(GMT-07:00) Denver"
            ],
            [
                "code" => "America/Edmonton",
                "value" => "(GMT-07:00) Edmonton"
            ],
            [
                "code" => "America/Hermosillo",
                "value" => "(GMT-07:00) Hermosillo"
            ],
            [
                "code" => "America/Mazatlan",
                "value" => "(GMT-07:00) Chihuahua, Mazatlan"
            ],
            [
                "code" => "America/Phoenix",
                "value" => "(GMT-07:00) Arizona"
            ],
            [
                "code" => "America/Yellowknife",
                "value" => "(GMT-07:00)Yellowknife"
            ],
            [
                "code" => "America/Belize",
                "value" => "(GMT-06:00) Belize"
            ],
            [
                "code" => "America/Chicago",
                "value" => "(GMT-06:00) Central Time"
            ],
            [
                "code" => "America/Costa_Rica",
                "value" => "(GMT-06:00) Costa Rica"
            ],
            [
                "code" => "America/El_Salvador",
                "value" => "(GMT-06:00) El Salvador"
            ],
            [
                "code" => "America/Guatemala",
                "value" => "(GMT-06:00) Guatemala"
            ],
            [
                "code" => "America/Managua",
                "value" => "(GMT-06:00) Managua"
            ],
            [
                "code" => "America/Mexico_City",
                "value" => "(GMT-06:00) Mexico City"
            ],
            [
                "code" => "America/Regina",
                "value" => "(GMT-06:00) Regina"
            ],
            [
                "code" => "America/Tegucigalpa",
                "value" => "(GMT-06:00) Tegucigalpa"
            ],
            [
                "code" => "America/Winnipeg",
                "value" => "(GMT-06:00) Winnipeg"
            ],
            [
                "code" => "Pacific/Galapagos",
                "value" => "(GMT-06:00) Galapagos"
            ],
            [
                "code" => "America/Bogota",
                "value" => "(GMT-05:00) Bogota"
            ],
            [
                "code" => "America/Cancun",
                "value" => "(GMT-05:00) America Cancun"
            ],
            [
                "code" => "America/Cayman",
                "value" => "(GMT-05:00) Cayman"
            ],
            [
                "code" => "America/Guayaquil",
                "value" => "(GMT-05:00) Guayaquil"
            ],
            [
                "code" => "America/Havana",
                "value" => "(GMT-05:00) Havana"
            ],
            [
                "code" => "America/Iqaluit",
                "value" => "(GMT-05:00) Iqaluit"
            ],
            [
                "code" => "America/Jamaica",
                "value" => "(GMT-05:00) Jamaica"
            ],
            [
                "code" => "America/Lima",
                "value" => "(GMT-05:00) Lima"
            ],
            [
                "code" => "America/Nassau",
                "value" => "(GMT-05:00) Nassau"
            ],
            [
                "code" => "America/New_York",
                "value" => "(GMT-05:00) New York"
            ],
            [
                "code" => "America/Panama",
                "value" => "(GMT-05:00) Panama"
            ],
            [
                "code" => "America/Port-au-Prince",
                "value" => "(GMT-05:00) Port-au-Prince"
            ],
            [
                "code" => "America/Rio_Branco",
                "value" => "(GMT-05:00) Rio Branco"
            ],
            [
                "code" => "America/Toronto",
                "value" => "(GMT-05:00) Toronto"
            ],
            [
                "code" => "Pacific/Easter",
                "value" => "(GMT-05:00) Easter Island"
            ],
            [
                "code" => "America/Caracas",
                "value" => "(GMT-04 =>30) Caracas"
            ],
            [
                "code" => "America/Asuncion",
                "value" => "(GMT-03:00) Asuncion"
            ],
            [
                "code" => "America/Barbados",
                "value" => "(GMT-04:00) Barbados"
            ],
            [
                "code" => "America/Boa_Vista",
                "value" => "(GMT-04:00) Boa Vista"
            ],
            [
                "code" => "America/Campo_Grande",
                "value" => "(GMT-03:00) Campo Grande"
            ],
            [
                "code" => "America/Cuiaba",
                "value" => "(GMT-03:00) Cuiaba"
            ],
            [
                "code" => "America/Curacao",
                "value" => "(GMT-04:00) Curacao"
            ],
            [
                "code" => "America/Grand_Turk",
                "value" => "(GMT-04:00) Grand Turk"
            ],
            [
                "code" => "America/Guyana",
                "value" => "(GMT-04:00) Guyana"
            ],
            [
                "code" => "America/Halifax",
                "value" => "(GMT-04:00) Halifax"
            ],
            [
                "code" => "America/La_Paz",
                "value" => "(GMT-04:00) La Paz"
            ],
            [
                "code" => "America/Manaus",
                "value" => "(GMT-04:00) Manaus"
            ],
            [
                "code" => "America/Martinique",
                "value" => "(GMT-04:00) Martinique"
            ],
            [
                "code" => "America/Port_of_Spain",
                "value" => "(GMT-04:00) Port of Spain"
            ],
            [
                "code" => "America/Porto_Velho",
                "value" => "(GMT-04:00) Porto Velho"
            ],
            [
                "code" => "America/Puerto_Rico",
                "value" => "(GMT-04:00) Puerto Rico"
            ],
            [
                "code" => "America/Santo_Domingo",
                "value" => "(GMT-04:00) Santo Domingo"
            ],
            [
                "code" => "America/Thule",
                "value" => "(GMT-04:00) Thule"
            ],
            [
                "code" => "Atlantic/Bermuda",
                "value" => "(GMT-04:00) Bermuda"
            ],
            [
                "code" => "America/Araguaina",
                "value" => "(GMT-03:00) Araguaina"
            ],
            [
                "code" => "America/Argentina/Buenos_Aires",
                "value" => "(GMT-03:00) Buenos Aires"
            ],
            [
                "code" => "America/Bahia",
                "value" => "(GMT-03:00) Salvador"
            ],
            [
                "code" => "America/Belem",
                "value" => "(GMT-03:00) Belem"
            ],
            [
                "code" => "America/Cayenne",
                "value" => "(GMT-03:00) Cayenne"
            ],
            [
                "code" => "America/Fortaleza",
                "value" => "(GMT-03:00) Fortaleza"
            ],
            [
                "code" => "America/Godthab",
                "value" => "(GMT-03:00) Godthab"
            ],
            [
                "code" => "America/Maceio",
                "value" => "(GMT-03:00) Maceio"
            ],
            [
                "code" => "America/Miquelon",
                "value" => "(GMT-03:00) Miquelon"
            ],
            [
                "code" => "America/Montevideo",
                "value" => "(GMT-03:00) Montevideo"
            ],
            [
                "code" => "America/Paramaribo",
                "value" => "(GMT-03:00) Paramaribo"
            ],
            [
                "code" => "America/Recife",
                "value" => "(GMT-03:00) Recife"
            ],
            [
                "code" => "America/Santiago",
                "value" => "(GMT-03:00) Santiago"
            ],
            [
                "code" => "America/Sao_Paulo",
                "value" => "(GMT-02:00) Sao Paulo"
            ],
            [
                "code" => "Antarctica/Palmer",
                "value" => "(GMT-03:00) Palmer"
            ],
            [
                "code" => "Antarctica/Rothera",
                "value" => "(GMT-03:00) Rothera"
            ],
            [
                "code" => "Atlantic/Stanley",
                "value" => "(GMT-03:00) Stanley"
            ],
            [
                "code" => "America/Noronha",
                "value" => "(GMT-02:00) Noronha"
            ],
            [
                "code" => "Atlantic/South_Georgia",
                "value" => "(GMT-02:00) South Georgia"
            ],
            [
                "code" => "America/Scoresbysund",
                "value" => "(GMT-01:00) Scoresbysund"
            ],
            [
                "code" => "Atlantic/Azores",
                "value" => "(GMT-01:00) Azores"
            ],
            [
                "code" => "Atlantic/Cape_Verde",
                "value" => "(GMT-01:00) Cape Verde"
            ],
            [
                "code" => "Africa/Abidjan",
                "value" => "(GMT+00:00) Abidjan"
            ],
            [
                "code" => "Africa/Accra",
                "value" => "(GMT+00:00) Accra"
            ],
            [
                "code" => "Africa/Bissau",
                "value" => "(GMT+00:00) Bissau"
            ],
            [
                "code" => "Africa/Casablanca",
                "value" => "(GMT+00:00) Casablanca"
            ],
            [
                "code" => "Africa/El_Aaiun",
                "value" => "(GMT+00:00) El Aaiun"
            ],
            [
                "code" => "Africa/Monrovia",
                "value" => "(GMT+00:00) Monrovia"
            ],
            [
                "code" => "America/Danmarkshavn",
                "value" => "(GMT+00:00) Danmarkshavn"
            ],
            [
                "code" => "Atlantic/Canary",
                "value" => "(GMT+00:00) Canary Islands"
            ],
            [
                "code" => "Atlantic/Faroe",
                "value" => "(GMT+00:00) Faeroe"
            ],
            [
                "code" => "Atlantic/Reykjavik",
                "value" => "(GMT+00:00) Reykjavik"
            ],
            [
                "code" => "Etc/GMT",
                "value" => "(GMT+00:00) GMT"
            ],
            [
                "code" => "Europe/Dublin",
                "value" => "(GMT+00:00) Dublin"
            ],
            [
                "code" => "Europe/Lisbon",
                "value" => "(GMT+00:00) Lisbon"
            ],
            [
                "code" => "Europe/London",
                "value" => "(GMT+00:00) London"
            ],
            [
                "code" => "Africa/Algiers",
                "value" => "(GMT+01:00) Algiers"
            ],
            [
                "code" => "Africa/Ceuta",
                "value" => "(GMT+01:00) Ceuta"
            ],
            [
                "code" => "Africa/Lagos",
                "value" => "(GMT+01:00) Lagos"
            ],
            [
                "code" => "Africa/Ndjamena",
                "value" => "(GMT+01:00) Ndjamena"
            ],
            [
                "code" => "Africa/Tunis",
                "value" => "(GMT+01:00) Tunis"
            ],
            [
                "code" => "Africa/Windhoek",
                "value" => "(GMT+02:00) Windhoek"
            ],
            [
                "code" => "Europe/Amsterdam",
                "value" => "(GMT+01:00) Amsterdam"
            ],
            [
                "code" => "Europe/Andorra",
                "value" => "(GMT+01:00) Andorra"
            ],
            [
                "code" => "Europe/Belgrade",
                "value" => "(GMT+01:00) Belgrade"
            ],
            [
                "code" => "Europe/Berlin",
                "value" => "(GMT+01:00) Berlin"
            ],
            [
                "code" => "Europe/Brussels",
                "value" => "(GMT+01:00) Brussels"
            ],
            [
                "code" => "Europe/Budapest",
                "value" => "(GMT+01:00) Budapest"
            ],
            [
                "code" => "Europe/Copenhagen",
                "value" => "(GMT+01:00) Copenhagen"
            ],
            [
                "code" => "Europe/Gibraltar",
                "value" => "(GMT+01:00) Gibraltar"
            ],
            [
                "code" => "Europe/Luxembourg",
                "value" => "(GMT+01:00) Luxembourg"
            ],
            [
                "code" => "Europe/Madrid",
                "value" => "(GMT+01:00) Madrid"
            ],
            [
                "code" => "Europe/Malta",
                "value" => "(GMT+01:00) Malta"
            ],
            [
                "code" => "Europe/Monaco",
                "value" => "(GMT+01:00) Monaco"
            ],
            [
                "code" => "Europe/Oslo",
                "value" => "(GMT+01:00) Oslo"
            ],
            [
                "code" => "Europe/Paris",
                "value" => "(GMT+01:00) Paris"
            ],
            [
                "code" => "Europe/Prague",
                "value" => "(GMT+01:00) Prague"
            ],
            [
                "code" => "Europe/Rome",
                "value" => "(GMT+01:00) Rome"
            ],
            [
                "code" => "Europe/Stockholm",
                "value" => "(GMT+01:00) Stockholm"
            ],
            [
                "code" => "Europe/Tirane",
                "value" => "(GMT+01:00) Tirane"
            ],
            [
                "code" => "Europe/Vienna",
                "value" => "(GMT+01:00) Vienna"
            ],
            [
                "code" => "Europe/Warsaw",
                "value" => "(GMT+01:00) Warsaw"
            ],
            [
                "code" => "Europe/Zurich",
                "value" => "(GMT+01:00) Zurich"
            ],
            [
                "code" => "Africa/Cairo",
                "value" => "(GMT+02:00) Cairo"
            ],
            [
                "code" => "Africa/Johannesburg",
                "value" => "(GMT+02:00) Johannesburg"
            ],
            [
                "code" => "Africa/Maputo",
                "value" => "(GMT+02:00) Maputo"
            ],
            [
                "code" => "Africa/Tripoli",
                "value" => "(GMT+02:00) Tripoli"
            ],
            [
                "code" => "Asia/Amman",
                "value" => "(GMT+02:00) Amman"
            ],
            [
                "code" => "Asia/Beirut",
                "value" => "(GMT+02:00) Beirut"
            ],
            [
                "code" => "Asia/Damascus",
                "value" => "(GMT+02:00) Damascus"
            ],
            [
                "code" => "Asia/Gaza",
                "value" => "(GMT+02:00) Gaza"
            ],
            [
                "code" => "Asia/Jerusalem",
                "value" => "(GMT+02:00) Jerusalem"
            ],
            [
                "code" => "Asia/Nicosia",
                "value" => "(GMT+02:00) Nicosia"
            ],
            [
                "code" => "Europe/Athens",
                "value" => "(GMT+02:00) Athens"
            ],
            [
                "code" => "Europe/Bucharest",
                "value" => "(GMT+02:00) Bucharest"
            ],
            [
                "code" => "Europe/Chisinau",
                "value" => "(GMT+02:00) Chisinau"
            ],
            [
                "code" => "Europe/Helsinki",
                "value" => "(GMT+02:00) Helsinki"
            ],
            [
                "code" => "Europe/Istanbul",
                "value" => "(GMT+02:00) Istanbul"
            ],
            [
                "code" => "Europe/Kaliningrad",
                "value" => "(GMT+02:00) Kaliningrad"
            ],
            [
                "code" => "Europe/Kiev",
                "value" => "(GMT+02:00) Kyiv"
            ],
            [
                "code" => "Europe/Riga",
                "value" => "(GMT+02:00) Riga"
            ],
            [
                "code" => "Europe/Sofia",
                "value" => "(GMT+02:00) Sofia"
            ],
            [
                "code" => "Europe/Tallinn",
                "value" => "(GMT+02:00) Tallinn"
            ],
            [
                "code" => "Europe/Vilnius",
                "value" => "(GMT+02:00) Vilnius"
            ],
            [
                "code" => "Africa/Khartoum",
                "value" => "(GMT+03:00) Khartoum"
            ],
            [
                "code" => "Africa/Nairobi",
                "value" => "(GMT+03:00) Nairobi"
            ],
            [
                "code" => "Antarctica/Syowa",
                "value" => "(GMT+03:00) Syowa"
            ],
            [
                "code" => "Asia/Baghdad",
                "value" => "(GMT+03:00) Baghdad"
            ],
            [
                "code" => "Asia/Qatar",
                "value" => "(GMT+03:00) Qatar"
            ],
            [
                "code" => "Asia/Riyadh",
                "value" => "(GMT+03:00) Riyadh"
            ],
            [
                "code" => "Europe/Minsk",
                "value" => "(GMT+03:00) Minsk"
            ],
            [
                "code" => "Europe/Moscow",
                "value" => "(GMT+03:00) Moscow"
            ],
            [
                "code" => "Asia/Tehran",
                "value" => "(GMT+03 =>30) Tehran"
            ],
            [
                "code" => "Asia/Baku",
                "value" => "(GMT+04:00) Baku"
            ],
            [
                "code" => "Asia/Dubai",
                "value" => "(GMT+04:00) Dubai"
            ],
            [
                "code" => "Asia/Tbilisi",
                "value" => "(GMT+04:00) Tbilisi"
            ],
            [
                "code" => "Asia/Yerevan",
                "value" => "(GMT+04:00) Yerevan"
            ],
            [
                "code" => "Europe/Samara",
                "value" => "(GMT+04:00) Samara"
            ],
            [
                "code" => "Indian/Mahe",
                "value" => "(GMT+04:00) Mahe"
            ],
            [
                "code" => "Indian/Mauritius",
                "value" => "(GMT+04:00) Mauritius"
            ],
            [
                "code" => "Indian/Reunion",
                "value" => "(GMT+04:00) Reunion"
            ],
            [
                "code" => "Asia/Kabul",
                "value" => "(GMT+04 =>30) Kabul"
            ],
            [
                "code" => "Antarctica/Mawson",
                "value" => "(GMT+05:00) Mawson"
            ],
            [
                "code" => "Asia/Aqtau",
                "value" => "(GMT+05:00) Aqtau"
            ],
            [
                "code" => "Asia/Aqtobe",
                "value" => "(GMT+05:00) Aqtobe"
            ],
            [
                "code" => "Asia/Ashgabat",
                "value" => "(GMT+05:00) Ashgabat"
            ],
            [
                "code" => "Asia/Dushanbe",
                "value" => "(GMT+05:00) Dushanbe"
            ],
            [
                "code" => "Asia/Karachi",
                "value" => "(GMT+05:00) Karachi"
            ],
            [
                "code" => "Asia/Tashkent",
                "value" => "(GMT+05:00) Tashkent"
            ],
            [
                "code" => "Asia/Yekaterinburg",
                "value" => "(GMT+05:00) Yekaterinburg"
            ],
            [
                "code" => "Indian/Kerguelen",
                "value" => "(GMT+05:00) Kerguelen"
            ],
            [
                "code" => "Indian/Maldives",
                "value" => "(GMT+05:00) Maldives"
            ],
            [
                "code" => "Asia/Calcutta",
                "value" => "(GMT+05 =>30) India Standard Time"
            ],
            [
                "code" => "Asia/Colombo",
                "value" => "(GMT+05 =>30) Colombo"
            ],
            [
                "code" => "Asia/Katmandu",
                "value" => "(GMT+05 =>45) Katmandu"
            ],
            [
                "code" => "Antarctica/Vostok",
                "value" => "(GMT+06:00) Vostok"
            ],
            [
                "code" => "Asia/Almaty",
                "value" => "(GMT+06:00) Almaty"
            ],
            [
                "code" => "Asia/Bishkek",
                "value" => "(GMT+06:00) Bishkek"
            ],
            [
                "code" => "Asia/Dhaka",
                "value" => "(GMT+06:00) Dhaka"
            ],
            [
                "code" => "Asia/Omsk",
                "value" => "(GMT+06:00) Omsk, Novosibirsk"
            ],
            [
                "code" => "Asia/Thimphu",
                "value" => "(GMT+06:00) Thimphu"
            ],
            [
                "code" => "Indian/Chagos",
                "value" => "(GMT+06:00) Chagos"
            ],
            [
                "code" => "Asia/Rangoon",
                "value" => "(GMT+06 =>30) Rangoon"
            ],
            [
                "code" => "Indian/Cocos",
                "value" => "(GMT+06 =>30) Cocos"
            ],
            [
                "code" => "Antarctica/Davis",
                "value" => "(GMT+07:00) Davis"
            ],
            [
                "code" => "Asia/Bangkok",
                "value" => "(GMT+07:00) Bangkok"
            ],
            [
                "code" => "Asia/Hovd",
                "value" => "(GMT+07:00) Hovd"
            ],
            [
                "code" => "Asia/Jakarta",
                "value" => "(GMT+07:00) Jakarta"
            ],
            [
                "code" => "Asia/Krasnoyarsk",
                "value" => "(GMT+07:00) Krasnoyarsk"
            ],
            [
                "code" => "Asia/Saigon",
                "value" => "(GMT+07:00) Hanoi"
            ],
            [
                "code" => "Asia/Ho_Chi_Minh",
                "value" => "(GMT+07:00) Ho Chi Minh"
            ],
            [
                "code" => "Indian/Christmas",
                "value" => "(GMT+07:00) Christmas"
            ],
            [
                "code" => "Antarctica/Casey",
                "value" => "(GMT+08:00) Casey"
            ],
            [
                "code" => "Asia/Brunei",
                "value" => "(GMT+08:00) Brunei"
            ],
            [
                "code" => "Asia/Choibalsan",
                "value" => "(GMT+08:00) Choibalsan"
            ],
            [
                "code" => "Asia/Hong_Kong",
                "value" => "(GMT+08:00) Hong Kong"
            ],
            [
                "code" => "Asia/Irkutsk",
                "value" => "(GMT+08:00) Irkutsk"
            ],
            [
                "code" => "Asia/Kuala_Lumpur",
                "value" => "(GMT+08:00) Kuala Lumpur"
            ],
            [
                "code" => "Asia/Macau",
                "value" => "(GMT+08:00) Macau"
            ],
            [
                "code" => "Asia/Makassar",
                "value" => "(GMT+08:00) Makassar"
            ],
            [
                "code" => "Asia/Manila",
                "value" => "(GMT+08:00) Manila"
            ],
            [
                "code" => "Asia/Shanghai",
                "value" => "(GMT+08:00) Beijing"
            ],
            [
                "code" => "Asia/Singapore",
                "value" => "(GMT+08:00) Singapore"
            ],
            [
                "code" => "Asia/Taipei",
                "value" => "(GMT+08:00) Taipei"
            ],
            [
                "code" => "Asia/Ulaanbaatar",
                "value" => "(GMT+08:00) Ulaanbaatar"
            ],
            [
                "code" => "Australia/Perth",
                "value" => "(GMT+08:00) Western Time - Perth"
            ],
            [
                "code" => "Asia/Pyongyang",
                "value" => "(GMT+08 =>30) Pyongyang"
            ],
            [
                "code" => "Asia/Dili",
                "value" => "(GMT+09:00) Dili"
            ],
            [
                "code" => "Asia/Jayapura",
                "value" => "(GMT+09:00) Jayapura"
            ],
            [
                "code" => "Asia/Seoul",
                "value" => "(GMT+09:00) Seoul"
            ],
            [
                "code" => "Asia/Tokyo",
                "value" => "(GMT+09:00) Tokyo"
            ],
            [
                "code" => "Asia/Yakutsk",
                "value" => "(GMT+09:00) Yakutsk"
            ],
            [
                "code" => "Pacific/Palau",
                "value" => "(GMT+09:00) Palau"
            ],
            [
                "code" => "Australia/Adelaide",
                "value" => "(GMT+10 =>30) Central Time - Adelaide"
            ],
            [
                "code" => "Australia/Darwin",
                "value" => "(GMT+09 =>30) Central Time - Darwin"
            ],
            [
                "code" => "Antarctica/DumontDUrville",
                "value" => "(GMT+10:00) Dumont D'Urville"
            ],
            [
                "code" => "Asia/Magadan",
                "value" => "(GMT+10:00) Magadan"
            ],
            [
                "code" => "Asia/Vladivostok",
                "value" => "(GMT+10:00) Yuzhno-Sakhalinsk"
            ],
            [
                "code" => "Australia/Brisbane",
                "value" => "(GMT+10:00) Eastern Time - Brisbane"
            ],
            [
                "code" => "Australia/Hobart",
                "value" => "(GMT+11:00) Hobart"
            ],
            [
                "code" => "Australia/Sydney",
                "value" => "(GMT+11:00) Melbourne, Sydney"
            ],
            [
                "code" => "Pacific/Chuuk",
                "value" => "(GMT+10:00) Truk"
            ],
            [
                "code" => "Pacific/Guam",
                "value" => "(GMT+10:00) Guam"
            ],
            [
                "code" => "Pacific/Port_Moresby",
                "value" => "(GMT+10:00) Port Moresby"
            ],
            [
                "code" => "Pacific/Efate",
                "value" => "(GMT+11:00) Efate"
            ],
            [
                "code" => "Pacific/Guadalcanal",
                "value" => "(GMT+11:00) Guadalcanal"
            ],
            [
                "code" => "Pacific/Kosrae",
                "value" => "(GMT+11:00) Kosrae"
            ],
            [
                "code" => "Pacific/Norfolk",
                "value" => "(GMT+11:00) Norfolk"
            ],
            [
                "code" => "Pacific/Noumea",
                "value" => "(GMT+11:00) Noumea"
            ],
            [
                "code" => "Pacific/Pohnpei",
                "value" => "(GMT+11:00) Ponape"
            ],
            [
                "code" => "Asia/Kamchatka",
                "value" => "(GMT+12:00) Petropavlovsk-Kamchatskiy"
            ],
            [
                "code" => "Pacific/Auckland",
                "value" => "(GMT+13:00) Auckland"
            ],
            [
                "code" => "Pacific/Fiji",
                "value" => "(GMT+13:00) Fiji"
            ],
            [
                "code" => "Pacific/Funafuti",
                "value" => "(GMT+12:00) Funafuti"
            ],
            [
                "code" => "Pacific/Kwajalein",
                "value" => "(GMT+12:00) Kwajalein"
            ],
            [
                "code" => "Pacific/Majuro",
                "value" => "(GMT+12:00) Majuro"
            ],
            [
                "code" => "Pacific/Nauru",
                "value" => "(GMT+12:00) Nauru"
            ],
            [
                "code" => "Pacific/Tarawa",
                "value" => "(GMT+12:00) Tarawa"
            ],
            [
                "code" => "Pacific/Wake",
                "value" => "(GMT+12:00) Wake"
            ],
            [
                "code" => "Pacific/Wallis",
                "value" => "(GMT+12:00) Wallis"
            ],
            [
                "code" => "Pacific/Apia",
                "value" => "(GMT+14:00) Apia"
            ],
            [
                "code" => "Pacific/Enderbury",
                "value" => "(GMT+13:00) Enderbury"
            ],
            [
                "code" => "Pacific/Fakaofo",
                "value" => "(GMT+13:00) Fakaofo"
            ],
            [
                "code" => "Pacific/Tongatapu",
                "value" => "(GMT+13:00) Tongatapu"
            ],
            [
                "code" => "Pacific/Kiritimati",
                "value" => "(GMT+14:00) Kiritimati"
            ]
        ];
    }
}

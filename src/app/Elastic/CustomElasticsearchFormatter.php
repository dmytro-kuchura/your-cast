<?php

namespace App\Elastic;

use Monolog\Formatter\ElasticsearchFormatter;

class CustomElasticsearchFormatter extends ElasticsearchFormatter
{
    public function format(array $record)
    {
        $record = parent::format($record);

        return $this->getDocument($record);
    }

    /**
     * Convert a log message into an Elasticsearch record
     *
     * @param mixed[] $record Log message
     * @return mixed[]
     */
    protected function getDocument(array $record): array
    {
        $record['context'] = json_encode($record['context'], JSON_UNESCAPED_SLASHES);
        $record['_index'] = $this->index;
        $record['_type'] = $this->type;

        return $record;
    }
}

<?php


namespace Tests\Json;


trait CustomersJsonResponse
{

    /**
     *
     */
    private function listJsonResponse(): array
    {
        return (new JsonResponseBuilder())
            ->setData(['customers' => []])
            ->setMetadata(['current_page', 'from', 'to', 'last_page'])
            ->setLinks(['first', 'last', 'prev', 'next'])
            ->get();
    }
}

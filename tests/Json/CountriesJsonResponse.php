<?php


namespace Tests\Json;


trait CountriesJsonResponse
{

    /**
     *
     */
    private function listJsonResponse(): array
    {
        return (new JsonResponseBuilder())
            ->setData(['countries' => []])
            ->get();
    }
}

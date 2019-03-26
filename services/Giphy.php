<?php

declare(strict_types=1);

namespace app\services;

class Giphy
{
    private $baseUrl = 'http://api.giphy.com/v1/';
    private $searchPath = 'gifs/random';
    private $apiKey = 'Oexyz3BXHucRr2zDhoLR8unyFYR3IXi8';

    public function getRandomGif(): string
    {
        $url = $this->buildUrl();
        $response = $this->sendRequest($url);
        if (!isset($response['data']['images']['downsized_large']['url'])) {
            throw new \Exception('Giphy service: bad response');
        }

        return $response['data']['images']['downsized_large']['url'];
    }

    /**
     * @return string
     */
    private function buildUrl(): string
    {
        $query = [
            'api_key' => $this->apiKey,
            'tag' => 'cat',
            'rating' => 'G',
        ];
        $url = sprintf('%s%s?%s', $this->baseUrl, $this->searchPath, http_build_query($query));

        return $url;
    }

    /**
     * @param string $url
     *
     * @return array
     */
    private function sendRequest(string $url): array
    {
        return (array) json_decode(file_get_contents($url), true);
    }
}
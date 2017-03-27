<?php

declare(strict_types=1);

namespace Jerome1337\Gandi;

use fXmlRpc\Proxy;
use fXmlRpc\Client as FxmlrpcClient;
use fXmlRpc\Transport\HttpAdapterTransport;
use GuzzleHttp\Client as HttpClient;
use Http\Adapter\Guzzle6\Client as GuzzleClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Jerome1337\Gandi\Api\AbstractApi;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Gandi
{
    /**
     * @var string
     */
    private $serverUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param $serverUrl
     * @param $apiKey
     */
    public function __construct($serverUrl, $apiKey)
    {
        $this->serverUrl = $serverUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return AbstractApi
     */
    public function __call($name, $arguments): AbstractApi
    {
        try {
            return $this->api(ucfirst(str_replace('api', '', $name)));
        } catch (\InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method %s', $name));
        }
    }

    /**
     * Return Gandi proxy
     *
     * @return Proxy
     */
    public function setup(): Proxy
    {
        $httpClient = new HttpClient();
        $client = new FxmlrpcClient(
            $this->serverUrl,
            new HttpAdapterTransport(
                new GuzzleMessageFactory(),
                new GuzzleClient($httpClient)
            )
        );

        $client->prependParams([$this->apiKey]);

        $proxy = new Proxy($client);

        return $proxy;
    }

    /**
     * @param string $apiClass
     *
     * @return AbstractApi
     */
    private function api(string $apiClass): AbstractApi
    {
        if (!isset($this->apis[$apiClass])) {
            $apiFQNClass = '\\Jerome1337\\Gandi\\Api\\'.$apiClass;
            if (false === class_exists($apiFQNClass)) {
                throw new \InvalidArgumentException(sprintf('Undefined api class %s', $apiClass));
            }
            $this->apis[$apiClass] = new $apiFQNClass($this);
        }
        return $this->apis[$apiClass];
    }
}

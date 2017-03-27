<?php

declare(strict_types=1);

namespace Jerome1337\Gandi;

use fXmlRpc\Proxy;
use fXmlRpc\Client as FxmlrpcClient;
use fXmlRpc\Transport\HttpAdapterTransport;
use GuzzleHttp\Client as HttpClient;
use Http\Adapter\Guzzle6\Client as GuzzleClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;

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
     * Return Gandi proxy
     *
     * @return Proxy
     */
    public function setup()
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
}

<?php

declare(strict_types=1);

namespace Jerome1337\Gandi\Api;

use Jerome1337\Gandi\Gandi;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
class AbstractApi
{
    /**
     * @var Gandi
     */
    protected $gandi;

    /**
     * @param Gandi $gandi
     */
    public function __construct(Gandi $gandi)
    {
        $this->gandi = $gandi;
    }
}

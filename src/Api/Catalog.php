<?php

declare(strict_types=1);

namespace Jerome1337\Gandi\Api;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
class Catalog extends AbstractApi
{
    /**
     * Return the wanted catalog entries
     *
     * @param array $options
     * @param string $currency
     * @param string $grid
     *
     * @return object
     */
    public function catalogList(array $options, $currency = 'EUR', $grid = 'A')
    {
        return $this->gandi->setup()->catalog->list($options, $currency, $grid);
    }
}

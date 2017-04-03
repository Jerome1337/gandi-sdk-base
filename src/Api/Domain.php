<?php

declare(strict_types=1);

namespace Jerome1337\Gandi\Api;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
class Domain extends AbstractApi
{
    /**
     * @param array $domain
     * @param array $options
     *
     * @return array
     */
    public function isAvailable(array $domain, array $options = null): array
    {
        $results = $this->gandi->setup()->domain->available($domain, $options);

        foreach ($results as $domain => $result) {
            if ('pending' == $result) {
                usleep(700000);

                return $this->gandi->setup()->domain->available($domain);
            }
        }

        return $results;
    }

    /**
     * @param string $domain
     *
     * @return array
     */
    public function info($domain): array
    {
        return $this->gandi->setup()->domain->info($domain);
    }

    /**
     * @param array $options
     *
     * @return object
     */
    public function getList(array $options)
    {
        return $this->gandi->setup()->domain->list($options);
    }

    /**
     * @param array $domain
     * @param array $options
     *
     * @return object
     */
    public function renew(array $domain, array $options = null)
    {
        return $this->gandi->setup()->domain->renew($domain, $options);

    }
}

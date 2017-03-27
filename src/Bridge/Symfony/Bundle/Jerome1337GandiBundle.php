<?php

declare(strict_types=1);

namespace Jerome1337\Gandi\Bridge\Symfony\Bundle;

use Jerome1337\Gandi\Bridge\Symfony\DependencyInjection\Jerome1337GandiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Jerome1337GandiBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensionClass(): string
    {
        return Jerome1337GandiExtension::class;
    }
}

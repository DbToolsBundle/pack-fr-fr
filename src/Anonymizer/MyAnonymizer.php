<?php

declare(strict_types=1);

namespace DbToolsBundle\PackExample\Anonymizer;

use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizer\AbstractEnumAnonymizer;
use MakinaCorpus\DbToolsBundle\Attribute\AsAnonymizer;

/**
 * An example of anonymizer.
 */
#[AsAnonymizer(
    name: 'my-anonymizer',
    pack: 'my-pack',
    description: 'A anonymizer provided by the example pack of the DbToolsBundle'
)]
class MyAnonymizer extends AbstractEnumAnonymizer
{
    /**
     * Overwrite this argument with your sample.
     */
    protected function getSample(): array
    {
        return ['foo', 'bar', 'baz'];
    }
}

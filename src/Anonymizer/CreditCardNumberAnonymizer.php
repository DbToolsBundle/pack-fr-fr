<?php

declare(strict_types=1);

namespace DbToolsBundle\PackDeDE\Anonymizer;

use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizer\AbstractEnumAnonymizer;
use MakinaCorpus\DbToolsBundle\Attribute\AsAnonymizer;

#[AsAnonymizer(
    name: 'cb',
    pack: 'de-de',
    description: <<<TXT
    Anonymize with a random impossible credit card numbers from a sample of 40 items.
    TXT
)]
class CreditCardNumberAnonymizer extends AbstractEnumAnonymizer
{
    /**
     * {@inheritdoc}
     */
    protected function getSample(): array
    {
        return [
           
"4111 1111 1111 1112", 
"4111 1111 1111 1112" ,
"4111 1111 1111 1112" ,
"4111 1111 1111 1113",
"4111 1111 1111 1114",
"4111 1111 1111 1115",
"4111 1111 1111 1116",
"4111 1111 1111 1117",
"4111 1111 1111 1118",
"4111 1111 1111 1119",
"4111 1111 1111 1110",
"4111 1111 1111 1120",
"5100 0000 0000 0001",
"5100 0000 0000 0002",
"5100 0000 0000 0003",
"5100 0000 0000 0004",
"5100 0000 0000 0005",
"5100 0000 0000 0006",
"5100 0000 0000 0007",
"5100 0000 0000 0008",
"5100 0000 0000 0009",
"5100 0000 0000 0010",
"3700 000000 00000",
"3700 000000 00001",
"3700 000000 00002",
"3700 000000 00003",
"3700 000000 00004",
"3700 000000 00005",
"3700 000000 00006",
"3700 000000 00007",
"3700 000000 00008",
"3700 000000 00009",
"6011 0000 0000 0001",
"6011 0000 0000 0002",
"6011 0000 0000 0003",
"6011 0000 0000 0004",
"6011 0000 0000 0005",
"6011 0000 0000 0006",
"6011 0000 0000 0007",
"6011 0000 0000 0008",
"6011 0000 0000 0009",
"6011 0000 0000 0010",
];
}
}

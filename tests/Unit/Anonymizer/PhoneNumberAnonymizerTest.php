<?php

declare(strict_types=1);

namespace DbToolsBundle\PackFrFR\Tests\Unit\Anonymizer;

use DbToolsBundle\PackFrFR\Anonymizer\PhoneNumberAnonymizer;
use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizer\Options;
use MakinaCorpus\DbToolsBundle\Test\UnitTestCase;

class PhoneNumberAnonymizerTest extends UnitTestCase
{
    public function testAnonymize(): void
    {
        $update = $this->getQueryBuilder()->update('some_table');

        $instance = new PhoneNumberAnonymizer(
            'some_table',
            'phone_column',
            $this->getDatabaseSession(),
            new Options(),
        );

        $instance->anonymize($update);

        self::assertSameSql(
            <<<SQL
            update "some_table"
            set
                "phone_column" = case
                    when "some_table"."phone_column" is not null
                        then #1 || lpad(cast(floor(random() * (cast(#2 as int) - #3 + 1) + #4) as varchar),cast(#5 as int),cast(#6 as varchar))
                    else null
                end
            SQL,
            $update,
        );
    }
}

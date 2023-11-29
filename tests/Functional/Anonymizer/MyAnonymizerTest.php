<?php

declare(strict_types=1);

namespace DbToolsBundle\PackExample\Tests\Functional\Anonymizer;

use DbToolsBundle\PackExample\Tests\FunctionalTestCase;
use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizator;
use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizer\AnonymizerRegistry;
use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizer\Options;
use MakinaCorpus\DbToolsBundle\Anonymization\Config\AnonymizationConfig;
use MakinaCorpus\DbToolsBundle\Anonymization\Config\AnonymizerConfig;

class MyAnonymizerTest extends FunctionalTestCase
{
    /** @before */
    protected function createTestData(): void
    {
        $this->createOrReplaceTable(
            'table_test',
            [
                'id' => 'integer',
                'my_data' => 'string',
            ],
            [
                [
                    'id' => '1',
                    'my_data' => 'data 1',
                ],
                [
                    'id' => '2',
                    'my_data' => 'data 2',
                ],
                [
                    'id' => '3',
                ],
            ],
        );
    }

    public function testAnonymize(): void
    {
        $config = new AnonymizationConfig();
        $config->add(new AnonymizerConfig(
            'table_test',
            'my_data',
            'my-pack.my-anonymizer',
            new Options()
        ));

        $anonymizator = new Anonymizator(
            $this->getConnection(),
            new AnonymizerRegistry(null, [\dirname(\dirname(\dirname(__DIR__))) . '/src']),
            $config
        );

        $this->assertSame(
            "data 1",
            $this->getConnection()->executeQuery('select my_data from table_test where id = 1')->fetchOne(),
        );

        foreach ($anonymizator->anonymize() as $message) {
        }

        $datas = $this->getConnection()->executeQuery('select * from table_test order by id asc')->fetchAllAssociative();
        $this->assertNotNull($datas[0]);
        $this->assertNotSame('data 1', $datas[0]['my_data']);
        $this->assertNotNull($datas[1]);
        $this->assertNotSame('data 2', $datas[1]['my_data']);
        $this->assertNull($datas[2]['my_data']);

        $this->assertCount(3, \array_unique(\array_map(fn ($value) => \serialize($value), $datas)), 'All generated values are different.');
    }
}

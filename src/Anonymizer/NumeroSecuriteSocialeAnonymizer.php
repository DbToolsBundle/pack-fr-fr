<?php
declare(strict_types=1);

namespace DbToolsBundle\PackFrFR\Anonymizer;

use MakinaCorpus\DbToolsBundle\Anonymization\Anonymizer\AbstractAnonymizer;
use MakinaCorpus\DbToolsBundle\Attribute\AsAnonymizer;
use MakinaCorpus\QueryBuilder\Query\Update;

/**
 * Anonymize french social sécurity numbers.
 */
#[AsAnonymizer(
    name: 'secu',
    pack: 'fr-fr',
    description: <<<TXT
    Anonymize with a random fictional french social sécurity numbers.
    TXT
)]
class NumeroSecuriteSocialeAnonymizer extends AbstractAnonymizer
{
    /**
     * {@inheritdoc}
     */


    public function anonymize(Update $update): void
    {
       
        $expr = $update->expression();


        $update->set(
            $this->columnName,
            $this->getSetIfNotNullExpression(
                $expr->concat(
                    $expr->lpad($this->getRandomIntExpression(4), 1, '0'),
                    $expr->lpad($this->getRandomIntExpression(9), 1, '0'),
                    $expr->lpad($this->getRandomIntExpression(9), 1, '0'),
                    // 13 correspond aux caractères 4 et 5 soit le mois de l'année 13=impossible
                    '13',
                    $expr->lpad($this->getRandomIntExpression(999999999), 10, '0'),

                )
            )
        );


    }
}


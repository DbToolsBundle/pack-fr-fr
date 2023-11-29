[![Coding standards](https://github.com/DbToolsBundle/pack-fr-fr/actions/workflows/coding-standards.yml/badge.svg)](https://github.com/DbToolsBundle/pack-fr-fr//actions/workflows/coding-standards.yml) [![Static Analysis](https://github.com/DbToolsBundle/pack-fr-fr/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/DbToolsBundle/pack-fr-fr/actions/workflows/static-analysis.yml) [![Continuous Integration](https://github.com/DbToolsBundle/pack-fr-fr/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/DbToolsBundle/pack-fr-fr/actions/workflows/continuous-integration.yml)


# DbToolsBundle - Pack fr-Fr
A pack of anonymizers for fr-FR locale

This pack provides:

* `fr-fr:address`: Same as `address` from core but with a sample of 500 dumb french addresses
* `fr-fr:firstname`: Anonymize with a random french first names from a sample of ~500 items
* `fr-fr:lastname`: Anonymize with a random french last names from a sample of ~500 items
* `fr-fr:phone`: Anonymize french telephone numbers, options are:
    * "mode": can be "mobile" or "landline"

## Installation

Run the following command to add this pack to your application:

```sh
composer require dbtoolsbundle/pack-fr-fr
```

Learn more about how to use this package reading [the DbToolsBundle documentation](https://dbtoolsbundle.readthedocs.io/) on Read the Docs.

## Licence

This software is published under the [MIT License](./LICENCE.md).

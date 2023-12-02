# Doctrine component

This component add some features to help Doctrine entities management.

## Installation
```shell
composer require atournayre/doctrine-component
```

### Usage

```php
namespace App\Repository;

use Atournayre\Component\Doctrine\Traits\SaveAndRemoveTrait;use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Atournayre\Component\Doctrine\Traits\SaveTrait;
use Atournayre\Component\Doctrine\Traits\RemoveTrait;

class TestRepository extends ServiceEntityRepository
{
    // To persist entities
    use SaveTrait;
    // To remove entities
    use RemoveTrait;
    // To persist and remove entities
    use SaveAndRemoveTrait;
}
```

```php
namespace App\Entity;

use Atournayre\Component\Doctrine\Contracts\IsEntityInterface;

class Test implements IsEntityInterface
{
}
```

## Contribution

Contributions are welcome!

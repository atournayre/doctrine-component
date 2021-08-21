# Doctrine

Ce composant est destiné à fournir des utilitaires Doctrine.

## Installation
```shell
# A définir
```

### Exemples d'utilisation

```php
use Atournayre\Common\Doctrine\ServiceEntityRepository;

class TestRepository extends ServiceEntityRepository
{
    // ...
    
    public function multiplesEntitesAPersister(
        Entite1 $entite1,
        Collection $entite2Collection,
        ?Entite3 $entite3 = null
    ): void
    {
        $this->persist($entite1);    
        $this->persist($entite2Collection);    
        $this->persist($entite3);    
        $this->flush();
    }


    public function multiplesEntitesAPersisterSansArguments(
        Entite1 $entite1,
        Collection $entite2Collection,
        ?Entite3 $entite3 = null
    ): void
    {
        $entites = func_get_args();
        foreach ($entites as $entite) {
            $this->persist($entite);
         }
        $this->flush();
    }
    // ...
}
```

## Contribution

Si vous souhaitez voir une nouvelle fonctionnalité, vous pouvez la demander
mais créer une pull request est un meilleur moyen de l'obtenir.

Vous pouvez également soumettre une issue : toutes les contributions et questions sont appréciées :).
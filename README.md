# Framework Web 2 CT

Membres du groupe :
* Massamba Prince-Marcel <prince-marcel.massamba@etu.univ-orleans.fr>
* Ouaammou Younes <younes.ouaammou@etu.univ-orleans.fr>
* Paul Nicolas <nicolas.paul1@etu.univ-orleans.fr>
* Paulo Lucas <lucas.paulo@etu.univ-orleans.fr>


## Question 1

Les propriétés pour représenter les informations d'observations :
* Date => `Date`
* Heure => `Time`
* Latitude => `Float`
* Longitude => `Float`
* Animal Observé => `Animal (ManyToOne)`
* Description => `Text`

# Question 2

```bash
symfony composer install
symfony console doctrine:database:create
symfony console make:entity 
symfony console make:entity 
symfony console make:migration
symfony console doctrine:migrations:migrate
symfony server:start --no-tls --listen-ip=0.0.0.0 --d
```

Points d'entrée pour Animal : 

```
GET /api/animals
POST /api/animals
GET /api/animals/{id}
DELETE /api/animals/{id}
PATCH /api/animals/{id}
```

Points d'entrée pour Observation : 
```
GET /api/observations
POST /api/observations
GET /api/observations/{id}
DELETE /api/observations/{id}
PATCH /api/observations/{id}
```
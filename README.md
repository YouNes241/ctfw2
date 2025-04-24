# Framework Web 2 - CT

Groupe :

- Paulo Lucas
- Ouaammou Younes
- Paul Nicolas
- Massamba Prince-Marcel

# Question 1

Les propriétés pour représenter les informations : 

- Date => Date
- Heure => Time
- Latitude => Float
- Longitude => Float
- Animal Observé => Animal (ManyToOne)
- Description => Text

# Question 2

```bash
symfony console doctrine:database:create
symfony console make:entity Animal
symfony console make:entity Observation
symfony console make:migrations
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
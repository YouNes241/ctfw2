<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424125012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__observation AS SELECT id, animal_id, date, heure, latitude, longitude, description FROM observation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE observation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE observation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, animal_id INTEGER NOT NULL, date DATE NOT NULL, time TIME NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, description CLOB NOT NULL, CONSTRAINT FK_C576DBE08E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO observation (id, animal_id, date, time, latitude, longitude, description) SELECT id, animal_id, date, heure, latitude, longitude, description FROM __temp__observation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__observation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C576DBE08E962C16 ON observation (animal_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__observation AS SELECT id, animal_id, date, time, latitude, longitude, description FROM observation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE observation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE observation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, animal_id INTEGER NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, description CLOB NOT NULL, CONSTRAINT FK_C576DBE08E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO observation (id, animal_id, date, heure, latitude, longitude, description) SELECT id, animal_id, date, time, latitude, longitude, description FROM __temp__observation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__observation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C576DBE08E962C16 ON observation (animal_id)
        SQL);
    }
}

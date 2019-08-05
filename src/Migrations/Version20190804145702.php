<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190804145702 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE matricule_moniteur (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_19CBE4BA4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matricule_moniteur ADD CONSTRAINT FK_19CBE4BA4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE moniteur ADD city VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD postalcode VARCHAR(255) NOT NULL, DROP nom, DROP prenom, DROP sex, DROP date_naissance, DROP ville, DROP adresse, DROP code_postal, DROP telephone, DROP voiture, CHANGE date_de_recrutement recruitmentDate DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE matricule_moniteur DROP FOREIGN KEY FK_19CBE4BA4A4A3511');
        $this->addSql('DROP TABLE matricule_moniteur');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('ALTER TABLE moniteur ADD nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD sex VARCHAR(1) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD date_naissance DATE DEFAULT NULL, ADD ville VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD code_postal VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD telephone INT NOT NULL, ADD voiture VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP city, DROP address, DROP postalcode, CHANGE recruitmentdate date_de_recrutement DATE NOT NULL');
    }
}

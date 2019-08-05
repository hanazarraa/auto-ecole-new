<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190804212454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE matricule_moniteur');
        $this->addSql('ALTER TABLE candidat CHANGE cin cin VARCHAR(8) NOT NULL');
        $this->addSql('ALTER TABLE moniteur CHANGE cin cin VARCHAR(8) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD moniteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DA234A5D3 FOREIGN KEY (moniteur_id) REFERENCES moniteur (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DA234A5D3 ON vehicule (moniteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE matricule_moniteur (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_19CBE4BA4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE matricule_moniteur ADD CONSTRAINT FK_19CBE4BA4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE candidat CHANGE cin cin VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE moniteur CHANGE cin cin INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DA234A5D3');
        $this->addSql('DROP INDEX IDX_292FFF1DA234A5D3 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP moniteur_id');
    }
}

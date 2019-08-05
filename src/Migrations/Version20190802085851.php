<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190802085851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat ADD type_permit INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE moniteur ADD vehicule_id INT NOT NULL');
        $this->addSql('ALTER TABLE moniteur ADD CONSTRAINT FK_B3EC8EBA4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('CREATE INDEX IDX_B3EC8EBA4A4A3511 ON moniteur (vehicule_id)');
        $this->addSql('ALTER TABLE fos_user_user CHANGE gender gender VARCHAR(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat DROP type_permit, CHANGE category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE fos_user_user CHANGE gender gender VARCHAR(66) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE moniteur DROP FOREIGN KEY FK_B3EC8EBA4A4A3511');
        $this->addSql('DROP INDEX IDX_B3EC8EBA4A4A3511 ON moniteur');
        $this->addSql('ALTER TABLE moniteur DROP vehicule_id');
    }
}

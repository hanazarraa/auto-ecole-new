<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190803234157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE moniteur ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE moniteur ADD CONSTRAINT FK_B3EC8EBAA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user_user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3EC8EBAA76ED395 ON moniteur (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE moniteur DROP FOREIGN KEY FK_B3EC8EBAA76ED395');
        $this->addSql('DROP INDEX UNIQ_B3EC8EBAA76ED395 ON moniteur');
        $this->addSql('ALTER TABLE moniteur DROP user_id');
    }
}
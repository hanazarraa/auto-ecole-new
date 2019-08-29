<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190819092657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4718F63531D');
        $this->addSql('ALTER TABLE seance_code_pc DROP FOREIGN KEY FK_FACC9C6D8F63531D');
        $this->addSql('DROP TABLE pc');
        $this->addSql('DROP TABLE seance_code_pc');
        $this->addSql('DROP INDEX IDX_6AB5B4718F63531D ON candidat');
        $this->addSql('ALTER TABLE candidat DROP pc_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pc (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, modele VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE seance_code_pc (seance_code_id INT NOT NULL, pc_id INT NOT NULL, INDEX IDX_FACC9C6DFFA8A0D6 (seance_code_id), INDEX IDX_FACC9C6D8F63531D (pc_id), PRIMARY KEY(seance_code_id, pc_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE seance_code_pc ADD CONSTRAINT FK_FACC9C6D8F63531D FOREIGN KEY (pc_id) REFERENCES pc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_code_pc ADD CONSTRAINT FK_FACC9C6DFFA8A0D6 FOREIGN KEY (seance_code_id) REFERENCES seance_code (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat ADD pc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4718F63531D FOREIGN KEY (pc_id) REFERENCES pc (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B4718F63531D ON candidat (pc_id)');
    }
}

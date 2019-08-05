<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190805091945 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidat_seance (candidat_id INT NOT NULL, seance_id INT NOT NULL, INDEX IDX_61B600728D0EB82 (candidat_id), INDEX IDX_61B60072E3797A94 (seance_id), PRIMARY KEY(candidat_id, seance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moniteur_seance (moniteur_id INT NOT NULL, seance_id INT NOT NULL, INDEX IDX_6412B461A234A5D3 (moniteur_id), INDEX IDX_6412B461E3797A94 (seance_id), PRIMARY KEY(moniteur_id, seance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat_seance ADD CONSTRAINT FK_61B600728D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat_seance ADD CONSTRAINT FK_61B60072E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moniteur_seance ADD CONSTRAINT FK_6412B461A234A5D3 FOREIGN KEY (moniteur_id) REFERENCES moniteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moniteur_seance ADD CONSTRAINT FK_6412B461E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moniteur DROP FOREIGN KEY FK_B3EC8EBAE3797A94');
        $this->addSql('DROP INDEX IDX_B3EC8EBAE3797A94 ON moniteur');
        $this->addSql('ALTER TABLE moniteur DROP seance_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE candidat_seance');
        $this->addSql('DROP TABLE moniteur_seance');
        $this->addSql('ALTER TABLE moniteur ADD seance_id INT NOT NULL');
        $this->addSql('ALTER TABLE moniteur ADD CONSTRAINT FK_B3EC8EBAE3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('CREATE INDEX IDX_B3EC8EBAE3797A94 ON moniteur (seance_id)');
    }
}

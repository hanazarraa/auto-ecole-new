<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190823133605 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE seances_moniteur');
        $this->addSql('DROP TABLE seances_vehicules');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE seances_moniteur (id INT AUTO_INCREMENT NOT NULL, seanceconduite_id INT NOT NULL, moniteur_id INT NOT NULL, INDEX IDX_967F6A0AA234A5D3 (moniteur_id), INDEX IDX_967F6A0A23497A40 (seanceconduite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE seances_vehicules (id INT AUTO_INCREMENT NOT NULL, seanceconduite_id INT NOT NULL, vehicule_id INT NOT NULL, INDEX IDX_B365AC454A4A3511 (vehicule_id), INDEX IDX_B365AC4523497A40 (seanceconduite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE seances_moniteur ADD CONSTRAINT FK_967F6A0A23497A40 FOREIGN KEY (seanceconduite_id) REFERENCES seance_conduite (id)');
        $this->addSql('ALTER TABLE seances_moniteur ADD CONSTRAINT FK_967F6A0AA234A5D3 FOREIGN KEY (moniteur_id) REFERENCES moniteur (id)');
        $this->addSql('ALTER TABLE seances_vehicules ADD CONSTRAINT FK_B365AC4523497A40 FOREIGN KEY (seanceconduite_id) REFERENCES seance_conduite (id)');
        $this->addSql('ALTER TABLE seances_vehicules ADD CONSTRAINT FK_B365AC454A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
    }
}

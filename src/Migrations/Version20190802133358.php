<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190802133358 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_6AB5B471A0D96FBF ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B47192FC23A8 ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471C05FB297 ON candidat');
        $this->addSql('ALTER TABLE candidat DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, DROP created_at, DROP updated_at, DROP date_of_birth, DROP firstname, DROP lastname, DROP website, DROP biography, DROP gender, DROP locale, DROP timezone, DROP phone, DROP facebook_uid, DROP facebook_name, DROP facebook_data, DROP twitter_uid, DROP twitter_name, DROP twitter_data, DROP gplus_uid, DROP gplus_name, DROP gplus_data, DROP token, DROP two_step_code');
        $this->addSql('ALTER TABLE moniteur ADD seance_id INT NOT NULL');
        $this->addSql('ALTER TABLE moniteur ADD CONSTRAINT FK_B3EC8EBAE3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('CREATE INDEX IDX_B3EC8EBAE3797A94 ON moniteur (seance_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat ADD username VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, ADD username_canonical VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, ADD email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, ADD email_canonical VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, ADD date_of_birth DATETIME DEFAULT NULL, ADD firstname VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD lastname VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD website VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD biography VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD gender VARCHAR(1) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD locale VARCHAR(8) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD timezone VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD phone VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD facebook_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD facebook_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD facebook_data JSON DEFAULT NULL, ADD twitter_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD twitter_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD twitter_data JSON DEFAULT NULL, ADD gplus_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD gplus_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD gplus_data JSON DEFAULT NULL, ADD token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD two_step_code VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471A0D96FBF ON candidat (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B47192FC23A8 ON candidat (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471C05FB297 ON candidat (confirmation_token)');
        $this->addSql('ALTER TABLE moniteur DROP FOREIGN KEY FK_B3EC8EBAE3797A94');
        $this->addSql('DROP INDEX IDX_B3EC8EBAE3797A94 ON moniteur');
        $this->addSql('ALTER TABLE moniteur DROP seance_id');
    }
}

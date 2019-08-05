<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801122220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) NOT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD created_at DATETIME NOT NULL, ADD date_of_birth DATETIME DEFAULT NULL, ADD firstname VARCHAR(64) DEFAULT NULL, ADD lastname VARCHAR(64) DEFAULT NULL, ADD website VARCHAR(64) DEFAULT NULL, ADD biography VARCHAR(1000) DEFAULT NULL, ADD gender VARCHAR(1) DEFAULT NULL, ADD timezone VARCHAR(64) DEFAULT NULL, ADD phone VARCHAR(64) DEFAULT NULL, ADD facebook_uid VARCHAR(255) DEFAULT NULL, ADD facebook_name VARCHAR(255) DEFAULT NULL, ADD facebook_data JSON DEFAULT NULL, ADD twitter_uid VARCHAR(255) DEFAULT NULL, ADD twitter_name VARCHAR(255) DEFAULT NULL, ADD twitter_data JSON DEFAULT NULL, ADD gplus_uid VARCHAR(255) DEFAULT NULL, ADD gplus_name VARCHAR(255) DEFAULT NULL, ADD gplus_data JSON DEFAULT NULL, ADD token VARCHAR(255) DEFAULT NULL, ADD two_step_code VARCHAR(255) DEFAULT NULL, DROP nom, DROP prenom, DROP date_naissance, CHANGE telephone telephone VARCHAR(8) DEFAULT NULL, CHANGE updated_at updated_at DATETIME NOT NULL, CHANGE cin locale VARCHAR(8) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B47192FC23A8 ON candidat (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471A0D96FBF ON candidat (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471C05FB297 ON candidat (confirmation_token)');
        $this->addSql('ALTER TABLE fos_user_user CHANGE gender gender VARCHAR(66) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_6AB5B47192FC23A8 ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471A0D96FBF ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471C05FB297 ON candidat');
        $this->addSql('ALTER TABLE candidat ADD nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD prenom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD date_naissance DATE DEFAULT NULL, DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, DROP created_at, DROP date_of_birth, DROP firstname, DROP lastname, DROP website, DROP biography, DROP gender, DROP timezone, DROP phone, DROP facebook_uid, DROP facebook_name, DROP facebook_data, DROP twitter_uid, DROP twitter_name, DROP twitter_data, DROP gplus_uid, DROP gplus_name, DROP gplus_data, DROP token, DROP two_step_code, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE locale cin VARCHAR(8) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE fos_user_user CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE gender gender VARCHAR(66) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}

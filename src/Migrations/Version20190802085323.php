<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190802085323 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE moniteur (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, cin INT NOT NULL, sex VARCHAR(1) DEFAULT NULL, date_naissance DATE DEFAULT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone INT NOT NULL, voiture VARCHAR(255) NOT NULL, date_de_recrutement DATE NOT NULL, passport VARCHAR(255) DEFAULT NULL, INDEX IDX_B3EC8EBA12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE moniteur ADD CONSTRAINT FK_B3EC8EBA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('DROP TABLE moniteurs');
        $this->addSql('ALTER TABLE candidat ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) NOT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD created_at DATETIME NOT NULL, ADD date_of_birth DATETIME DEFAULT NULL, ADD firstname VARCHAR(64) DEFAULT NULL, ADD lastname VARCHAR(64) DEFAULT NULL, ADD website VARCHAR(64) DEFAULT NULL, ADD biography VARCHAR(1000) DEFAULT NULL, ADD gender VARCHAR(1) DEFAULT NULL, ADD locale VARCHAR(8) DEFAULT NULL, ADD timezone VARCHAR(64) DEFAULT NULL, ADD phone VARCHAR(64) DEFAULT NULL, ADD facebook_uid VARCHAR(255) DEFAULT NULL, ADD facebook_name VARCHAR(255) DEFAULT NULL, ADD facebook_data JSON DEFAULT NULL, ADD twitter_uid VARCHAR(255) DEFAULT NULL, ADD twitter_name VARCHAR(255) DEFAULT NULL, ADD twitter_data JSON DEFAULT NULL, ADD gplus_uid VARCHAR(255) DEFAULT NULL, ADD gplus_name VARCHAR(255) DEFAULT NULL, ADD gplus_data JSON DEFAULT NULL, ADD token VARCHAR(255) DEFAULT NULL, ADD two_step_code VARCHAR(255) DEFAULT NULL, ADD type_permit INT DEFAULT NULL, DROP nom, DROP prenom, DROP cin, DROP date_naissance, CHANGE category_id category_id INT DEFAULT NULL, CHANGE telephone telephone VARCHAR(8) DEFAULT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B47192FC23A8 ON candidat (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471A0D96FBF ON candidat (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471C05FB297 ON candidat (confirmation_token)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE moniteurs (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, vehicule_id INT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, cin INT NOT NULL, sex VARCHAR(1) DEFAULT NULL COLLATE utf8mb4_unicode_ci, date_naissance DATE DEFAULT NULL, ville VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, code_postal VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, telephone INT NOT NULL, voiture VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, date_de_recrutement DATE NOT NULL, passport VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_300979174A4A3511 (vehicule_id), INDEX IDX_3009791712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE moniteurs ADD CONSTRAINT FK_3009791712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE moniteurs ADD CONSTRAINT FK_300979174A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('DROP TABLE moniteur');
        $this->addSql('DROP INDEX UNIQ_6AB5B47192FC23A8 ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471A0D96FBF ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471C05FB297 ON candidat');
        $this->addSql('ALTER TABLE candidat ADD nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD prenom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD cin VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD date_naissance DATE DEFAULT NULL, DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, DROP created_at, DROP date_of_birth, DROP firstname, DROP lastname, DROP website, DROP biography, DROP gender, DROP locale, DROP timezone, DROP phone, DROP facebook_uid, DROP facebook_name, DROP facebook_data, DROP twitter_uid, DROP twitter_name, DROP twitter_data, DROP gplus_uid, DROP gplus_name, DROP gplus_data, DROP token, DROP two_step_code, DROP type_permit, CHANGE category_id category_id INT NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}

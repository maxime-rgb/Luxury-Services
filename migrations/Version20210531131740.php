<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531131740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, job_category_id INT DEFAULT NULL, experience_id INT DEFAULT NULL, user_id INT DEFAULT NULL, gender_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, profile_picture VARCHAR(255) NOT NULL, current_location VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, availability TINYINT(1) NOT NULL, short_description VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, passport VARCHAR(255) NOT NULL, INDEX IDX_6AB5B471712A86AB (job_category_id), INDEX IDX_6AB5B47146E90E27 (experience_id), INDEX IDX_6AB5B471A76ED395 (user_id), UNIQUE INDEX UNIQ_6AB5B471708A0E0 (gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B47146E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidat');
    }
}

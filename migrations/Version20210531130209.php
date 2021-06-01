<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531130209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, job_category_id INT DEFAULT NULL, job_type_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, note VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, closing_date DATETIME NOT NULL, salary INT NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_288A3A4E19EB6921 (client_id), INDEX IDX_288A3A4E712A86AB (job_category_id), INDEX IDX_288A3A4E5FA33B08 (job_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E5FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_type (id)');
        $this->addSql('ALTER TABLE info_admin_client DROP INDEX IDX_B751E20B19EB6921, ADD UNIQUE INDEX UNIQ_B751E20B19EB6921 (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('ALTER TABLE info_admin_client DROP INDEX UNIQ_B751E20B19EB6921, ADD INDEX IDX_B751E20B19EB6921 (client_id)');
    }
}

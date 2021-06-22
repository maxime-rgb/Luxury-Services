<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611075523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_admin_candidat DROP INDEX UNIQ_7E4F3F38D0EB82, ADD INDEX IDX_7E4F3F38D0EB82 (candidat_id)');
        $this->addSql('ALTER TABLE job_offer CHANGE job_category_id job_category_id INT NOT NULL, CHANGE job_type_id job_type_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_admin_candidat DROP INDEX IDX_7E4F3F38D0EB82, ADD UNIQUE INDEX UNIQ_7E4F3F38D0EB82 (candidat_id)');
        $this->addSql('ALTER TABLE job_offer CHANGE job_category_id job_category_id INT DEFAULT NULL, CHANGE job_type_id job_type_id INT DEFAULT NULL');
    }
}

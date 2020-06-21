<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200621125409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('DROP TABLE greeting');
        $this->addSql('ALTER TABLE category RENAME COLUMN name TO naÃme');
        $this->addSql('ALTER TABLE "position" ADD title VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE "position" DROP name');
        $this->addSql('ALTER TABLE "position" DROP location');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE category RENAME COLUMN naÃme TO name');
        $this->addSql('ALTER TABLE position ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE position ADD location VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE position DROP title');
    }
}

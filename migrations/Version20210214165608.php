<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210214165608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE current_substance (id INT AUTO_INCREMENT NOT NULL, medicine_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_3FA77AB52F7D140A (medicine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manufacturer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicine (id INT AUTO_INCREMENT NOT NULL, manufacturer_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, price NUMERIC(10, 0) NOT NULL, INDEX IDX_58362A8DA23B42D (manufacturer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE current_substance ADD CONSTRAINT FK_3FA77AB52F7D140A FOREIGN KEY (medicine_id) REFERENCES medicine (id)');
        $this->addSql('ALTER TABLE medicine ADD CONSTRAINT FK_58362A8DA23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicine DROP FOREIGN KEY FK_58362A8DA23B42D');
        $this->addSql('ALTER TABLE current_substance DROP FOREIGN KEY FK_3FA77AB52F7D140A');
        $this->addSql('DROP TABLE current_substance');
        $this->addSql('DROP TABLE manufacturer');
        $this->addSql('DROP TABLE medicine');
    }
}

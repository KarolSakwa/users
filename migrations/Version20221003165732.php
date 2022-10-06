<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003165732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD street VARCHAR(255) DEFAULT NULL, ADD suite VARCHAR(255) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, ADD zipcode VARCHAR(255) DEFAULT NULL, ADD lat DOUBLE PRECISION DEFAULT NULL, ADD lng DOUBLE PRECISION DEFAULT NULL, ADD company_name VARCHAR(255) DEFAULT NULL, ADD company_catchphrase VARCHAR(255) DEFAULT NULL, ADD company_bs VARCHAR(255) DEFAULT NULL, DROP address, DROP company');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD address LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD company LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', DROP street, DROP suite, DROP city, DROP zipcode, DROP lat, DROP lng, DROP company_name, DROP company_catchphrase, DROP company_bs');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201118101248 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livreur_plat (livreur_id INT NOT NULL, plat_id INT NOT NULL, INDEX IDX_8398894FF8646701 (livreur_id), INDEX IDX_8398894FD73DB560 (plat_id), PRIMARY KEY(livreur_id, plat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livreur_plat ADD CONSTRAINT FK_8398894FF8646701 FOREIGN KEY (livreur_id) REFERENCES livreur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livreur_plat ADD CONSTRAINT FK_8398894FD73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE livreur_plat');
    }
}

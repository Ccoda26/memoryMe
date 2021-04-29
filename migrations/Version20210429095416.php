<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429095416 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE title_cards_user (title_cards_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_94FB71E9F5CEE4D6 (title_cards_id), INDEX IDX_94FB71E9A76ED395 (user_id), PRIMARY KEY(title_cards_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE title_cards_user ADD CONSTRAINT FK_94FB71E9F5CEE4D6 FOREIGN KEY (title_cards_id) REFERENCES title_cards (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE title_cards_user ADD CONSTRAINT FK_94FB71E9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE title_cards_user');
    }
}

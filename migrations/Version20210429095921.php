<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429095921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cards ADD title_of_cards_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD461B80D3 FOREIGN KEY (title_of_cards_id) REFERENCES title_cards (id)');
        $this->addSql('CREATE INDEX IDX_4C258FD461B80D3 ON cards (title_of_cards_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD461B80D3');
        $this->addSql('DROP INDEX IDX_4C258FD461B80D3 ON cards');
        $this->addSql('ALTER TABLE cards DROP title_of_cards_id');
    }
}

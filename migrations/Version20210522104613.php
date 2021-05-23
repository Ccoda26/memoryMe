<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522104613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title_cards DROP FOREIGN KEY FK_C433EE8AB4D9E843');
        $this->addSql('DROP INDEX IDX_C433EE8AB4D9E843 ON title_cards');
        $this->addSql('ALTER TABLE title_cards CHANGE cate_title_id category_list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE title_cards ADD CONSTRAINT FK_C433EE8AFA7656F5 FOREIGN KEY (category_list_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_C433EE8AFA7656F5 ON title_cards (category_list_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title_cards DROP FOREIGN KEY FK_C433EE8AFA7656F5');
        $this->addSql('DROP INDEX IDX_C433EE8AFA7656F5 ON title_cards');
        $this->addSql('ALTER TABLE title_cards CHANGE category_list_id cate_title_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE title_cards ADD CONSTRAINT FK_C433EE8AB4D9E843 FOREIGN KEY (cate_title_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_C433EE8AB4D9E843 ON title_cards (cate_title_id)');
    }
}

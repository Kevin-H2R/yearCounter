<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190102154141 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE counter_tag (counter_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_51A28220FCEEF2E3 (counter_id), INDEX IDX_51A28220BAD26311 (tag_id), PRIMARY KEY(counter_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE counter_tag ADD CONSTRAINT FK_51A28220FCEEF2E3 FOREIGN KEY (counter_id) REFERENCES counter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE counter_tag ADD CONSTRAINT FK_51A28220BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE counter_tag');
    }
}

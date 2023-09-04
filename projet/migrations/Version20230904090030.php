<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230904090030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE post ADD userid_id INT NOT NULL, ADD catégorie_id INT NOT NULL, ADD creat_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP date, DROP userid, DROP catégorie, CHANGE message message VARCHAR(10000) NOT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D58E0A285 FOREIGN KEY (userid_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D7A2E475A FOREIGN KEY (catégorie_id) REFERENCES catégorie (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D58E0A285 ON post (userid_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D7A2E475A ON post (catégorie_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E95126AC48 ON users (mail)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E986CC499D ON users (pseudo)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, src VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D58E0A285');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D7A2E475A');
        $this->addSql('DROP INDEX IDX_5A8A6C8D58E0A285 ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8D7A2E475A ON post');
        $this->addSql('ALTER TABLE post ADD date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD userid INT NOT NULL, ADD catégorie INT NOT NULL, DROP userid_id, DROP catégorie_id, DROP creat_at, CHANGE message message VARCHAR(2500) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1483A5E95126AC48 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E986CC499D ON users');
    }
}

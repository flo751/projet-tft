<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230906124042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD userid_id INT NOT NULL, ADD postid_id INT NOT NULL, DROP userid, DROP postid');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC58E0A285 FOREIGN KEY (userid_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCEB348947 FOREIGN KEY (postid_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC58E0A285 ON commentaire (userid_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCEB348947 ON commentaire (postid_id)');
        $this->addSql('ALTER TABLE post ADD userid_id INT NOT NULL, ADD catégorie_id INT NOT NULL, DROP userid, DROP catégorie');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D58E0A285 FOREIGN KEY (userid_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D7A2E475A FOREIGN KEY (catégorie_id) REFERENCES catégorie (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D58E0A285 ON post (userid_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D7A2E475A ON post (catégorie_id)');
        $this->addSql('ALTER TABLE users DROP creat_at, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC58E0A285');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCEB348947');
        $this->addSql('DROP INDEX IDX_67F068BC58E0A285 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BCEB348947 ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD userid INT NOT NULL, ADD postid INT NOT NULL, DROP userid_id, DROP postid_id');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D58E0A285');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D7A2E475A');
        $this->addSql('DROP INDEX IDX_5A8A6C8D58E0A285 ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8D7A2E475A ON post');
        $this->addSql('ALTER TABLE post ADD userid INT NOT NULL, ADD catégorie INT NOT NULL, DROP userid_id, DROP catégorie_id');
        $this->addSql('ALTER TABLE users ADD creat_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE password password VARCHAR(1000) NOT NULL');
    }
}

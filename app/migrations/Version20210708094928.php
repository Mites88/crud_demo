<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210708094928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C53D045F4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__image AS SELECT id, product_id, name, title, path, image_size, updated_at FROM image');
        $this->addSql('DROP TABLE image');
        $this->addSql('CREATE TABLE image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, title VARCHAR(255) DEFAULT NULL COLLATE BINARY, path VARCHAR(255) NOT NULL COLLATE BINARY, image_size INTEGER NOT NULL, updated_at DATETIME NOT NULL, CONSTRAINT FK_C53D045F4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO image (id, product_id, name, title, path, image_size, updated_at) SELECT id, product_id, name, title, path, image_size, updated_at FROM __temp__image');
        $this->addSql('DROP TABLE __temp__image');
        $this->addSql('CREATE INDEX IDX_C53D045F4584665A ON image (product_id)');
        $this->addSql('DROP INDEX IDX_E3A6E39C4584665A');
        $this->addSql('DROP INDEX IDX_E3A6E39CBAD26311');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product_tag AS SELECT product_id, tag_id FROM product_tag');
        $this->addSql('DROP TABLE product_tag');
        $this->addSql('CREATE TABLE product_tag (product_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(product_id, tag_id), CONSTRAINT FK_E3A6E39C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E3A6E39CBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product_tag (product_id, tag_id) SELECT product_id, tag_id FROM __temp__product_tag');
        $this->addSql('DROP TABLE __temp__product_tag');
        $this->addSql('CREATE INDEX IDX_E3A6E39C4584665A ON product_tag (product_id)');
        $this->addSql('CREATE INDEX IDX_E3A6E39CBAD26311 ON product_tag (tag_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C53D045F4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__image AS SELECT id, product_id, name, title, path, image_size, updated_at FROM image');
        $this->addSql('DROP TABLE image');
        $this->addSql('CREATE TABLE image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, image_size INTEGER NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO image (id, product_id, name, title, path, image_size, updated_at) SELECT id, product_id, name, title, path, image_size, updated_at FROM __temp__image');
        $this->addSql('DROP TABLE __temp__image');
        $this->addSql('CREATE INDEX IDX_C53D045F4584665A ON image (product_id)');
        $this->addSql('DROP INDEX IDX_E3A6E39C4584665A');
        $this->addSql('DROP INDEX IDX_E3A6E39CBAD26311');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product_tag AS SELECT product_id, tag_id FROM product_tag');
        $this->addSql('DROP TABLE product_tag');
        $this->addSql('CREATE TABLE product_tag (product_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(product_id, tag_id))');
        $this->addSql('INSERT INTO product_tag (product_id, tag_id) SELECT product_id, tag_id FROM __temp__product_tag');
        $this->addSql('DROP TABLE __temp__product_tag');
        $this->addSql('CREATE INDEX IDX_E3A6E39C4584665A ON product_tag (product_id)');
        $this->addSql('CREATE INDEX IDX_E3A6E39CBAD26311 ON product_tag (tag_id)');
    }
}

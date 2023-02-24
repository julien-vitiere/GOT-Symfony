<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224064443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY character_id_title_foreign');
        $this->addSql('CREATE TABLE characters (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE house_has_characters DROP FOREIGN KEY house_has_characters_character_foreign');
        $this->addSql('ALTER TABLE house_has_characters DROP FOREIGN KEY house_has_characters_house_foreign');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE house_has_characters');
        $this->addSql('DROP TABLE migrations');
        $this->addSql('DROP TABLE title');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY character_father_id_foreign');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY character_mother_id_foreign');
        $this->addSql('DROP INDEX character_mother_id_foreign ON `character`');
        $this->addSql('DROP INDEX character_father_id_foreign ON `character`');
        $this->addSql('DROP INDEX character_id_title_foreign ON `character`');
        $this->addSql('ALTER TABLE `character` DROP mother_id, DROP father_id, DROP id_title, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE last_name last_name VARCHAR(100) NOT NULL, CHANGE first_name first_name VARCHAR(100) NOT NULL, CHANGE biography biography VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE house (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, colour VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE house_has_characters (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, `character` BIGINT UNSIGNED NOT NULL, house BIGINT UNSIGNED NOT NULL, INDEX house_has_characters_character_foreign (`character`), INDEX house_has_characters_house_foreign (house), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE migrations (id INT UNSIGNED AUTO_INCREMENT NOT NULL, migration VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, batch INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE house_has_characters ADD CONSTRAINT house_has_characters_character_foreign FOREIGN KEY (`character`) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE house_has_characters ADD CONSTRAINT house_has_characters_house_foreign FOREIGN KEY (house) REFERENCES house (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE characters');
        $this->addSql('ALTER TABLE `character` ADD mother_id BIGINT UNSIGNED DEFAULT NULL, ADD father_id BIGINT UNSIGNED DEFAULT NULL, ADD id_title BIGINT UNSIGNED DEFAULT NULL, CHANGE id id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE biography biography TEXT NOT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT character_father_id_foreign FOREIGN KEY (father_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT character_id_title_foreign FOREIGN KEY (id_title) REFERENCES title (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT character_mother_id_foreign FOREIGN KEY (mother_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX character_mother_id_foreign ON `character` (mother_id)');
        $this->addSql('CREATE INDEX character_father_id_foreign ON `character` (father_id)');
        $this->addSql('CREATE INDEX character_id_title_foreign ON `character` (id_title)');
    }
}

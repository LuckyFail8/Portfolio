<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230915131712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, published_at DATE NOT NULL, update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', author VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_image (article_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_B28A764E7294869C (article_id), INDEX IDX_B28A764E3DA5256D (image_id), PRIMARY KEY(article_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_project (article_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_C26194597294869C (article_id), INDEX IDX_C2619459166D1F9C (project_id), PRIMARY KEY(article_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_technology (article_id INT NOT NULL, technology_id INT NOT NULL, INDEX IDX_C8BA83CC7294869C (article_id), INDEX IDX_C8BA83CC4235D463 (technology_id), PRIMARY KEY(article_id, technology_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text_alt VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_experience (id INT AUTO_INCREMENT NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, website_link VARCHAR(255) DEFAULT NULL, repository_link VARCHAR(255) DEFAULT NULL, ranking INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_image (project_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_D6680DC1166D1F9C (project_id), INDEX IDX_D6680DC13DA5256D (image_id), PRIMARY KEY(project_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_technology (project_id INT NOT NULL, technology_id INT NOT NULL, INDEX IDX_ECC5297F166D1F9C (project_id), INDEX IDX_ECC5297F4235D463 (technology_id), PRIMARY KEY(project_id, technology_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ranking INT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_image ADD CONSTRAINT FK_B28A764E7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_image ADD CONSTRAINT FK_B28A764E3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_project ADD CONSTRAINT FK_C26194597294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_project ADD CONSTRAINT FK_C2619459166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_technology ADD CONSTRAINT FK_C8BA83CC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_technology ADD CONSTRAINT FK_C8BA83CC4235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_image ADD CONSTRAINT FK_D6680DC1166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_image ADD CONSTRAINT FK_D6680DC13DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_technology ADD CONSTRAINT FK_ECC5297F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_technology ADD CONSTRAINT FK_ECC5297F4235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_image DROP FOREIGN KEY FK_B28A764E7294869C');
        $this->addSql('ALTER TABLE article_image DROP FOREIGN KEY FK_B28A764E3DA5256D');
        $this->addSql('ALTER TABLE article_project DROP FOREIGN KEY FK_C26194597294869C');
        $this->addSql('ALTER TABLE article_project DROP FOREIGN KEY FK_C2619459166D1F9C');
        $this->addSql('ALTER TABLE article_technology DROP FOREIGN KEY FK_C8BA83CC7294869C');
        $this->addSql('ALTER TABLE article_technology DROP FOREIGN KEY FK_C8BA83CC4235D463');
        $this->addSql('ALTER TABLE project_image DROP FOREIGN KEY FK_D6680DC1166D1F9C');
        $this->addSql('ALTER TABLE project_image DROP FOREIGN KEY FK_D6680DC13DA5256D');
        $this->addSql('ALTER TABLE project_technology DROP FOREIGN KEY FK_ECC5297F166D1F9C');
        $this->addSql('ALTER TABLE project_technology DROP FOREIGN KEY FK_ECC5297F4235D463');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_image');
        $this->addSql('DROP TABLE article_project');
        $this->addSql('DROP TABLE article_technology');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE professional_experience');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_image');
        $this->addSql('DROP TABLE project_technology');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912222227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, publication_date DATE NOT NULL, update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', author VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_images (articles_id INT NOT NULL, images_id INT NOT NULL, INDEX IDX_5A276A471EBAF6CC (articles_id), INDEX IDX_5A276A47D44F05E5 (images_id), PRIMARY KEY(articles_id, images_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_projects (articles_id INT NOT NULL, projects_id INT NOT NULL, INDEX IDX_FD0745BE1EBAF6CC (articles_id), INDEX IDX_FD0745BE1EDE0F55 (projects_id), PRIMARY KEY(articles_id, projects_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_technologies (articles_id INT NOT NULL, technologies_id INT NOT NULL, INDEX IDX_76DA9FE11EBAF6CC (articles_id), INDEX IDX_76DA9FE18F8A14FA (technologies_id), PRIMARY KEY(articles_id, technologies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text_alt VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_experience (id INT AUTO_INCREMENT NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, website_link VARCHAR(255) DEFAULT NULL, repository_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_images (projects_id INT NOT NULL, images_id INT NOT NULL, INDEX IDX_21EB22951EDE0F55 (projects_id), INDEX IDX_21EB2295D44F05E5 (images_id), PRIMARY KEY(projects_id, images_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_technologies (projects_id INT NOT NULL, technologies_id INT NOT NULL, INDEX IDX_2590E7421EDE0F55 (projects_id), INDEX IDX_2590E7428F8A14FA (technologies_id), PRIMARY KEY(projects_id, technologies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_images ADD CONSTRAINT FK_5A276A471EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_images ADD CONSTRAINT FK_5A276A47D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_projects ADD CONSTRAINT FK_FD0745BE1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_projects ADD CONSTRAINT FK_FD0745BE1EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_technologies ADD CONSTRAINT FK_76DA9FE11EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_technologies ADD CONSTRAINT FK_76DA9FE18F8A14FA FOREIGN KEY (technologies_id) REFERENCES technologies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_images ADD CONSTRAINT FK_21EB22951EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_images ADD CONSTRAINT FK_21EB2295D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_technologies ADD CONSTRAINT FK_2590E7421EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_technologies ADD CONSTRAINT FK_2590E7428F8A14FA FOREIGN KEY (technologies_id) REFERENCES technologies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_images DROP FOREIGN KEY FK_5A276A471EBAF6CC');
        $this->addSql('ALTER TABLE articles_images DROP FOREIGN KEY FK_5A276A47D44F05E5');
        $this->addSql('ALTER TABLE articles_projects DROP FOREIGN KEY FK_FD0745BE1EBAF6CC');
        $this->addSql('ALTER TABLE articles_projects DROP FOREIGN KEY FK_FD0745BE1EDE0F55');
        $this->addSql('ALTER TABLE articles_technologies DROP FOREIGN KEY FK_76DA9FE11EBAF6CC');
        $this->addSql('ALTER TABLE articles_technologies DROP FOREIGN KEY FK_76DA9FE18F8A14FA');
        $this->addSql('ALTER TABLE projects_images DROP FOREIGN KEY FK_21EB22951EDE0F55');
        $this->addSql('ALTER TABLE projects_images DROP FOREIGN KEY FK_21EB2295D44F05E5');
        $this->addSql('ALTER TABLE projects_technologies DROP FOREIGN KEY FK_2590E7421EDE0F55');
        $this->addSql('ALTER TABLE projects_technologies DROP FOREIGN KEY FK_2590E7428F8A14FA');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE articles_images');
        $this->addSql('DROP TABLE articles_projects');
        $this->addSql('DROP TABLE articles_technologies');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE professional_experience');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_images');
        $this->addSql('DROP TABLE projects_technologies');
        $this->addSql('DROP TABLE technologies');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

CREATE TABLE banner (id BIGINT AUTO_INCREMENT, project_id BIGINT NOT NULL, image_url VARCHAR(255), image_text VARCHAR(255), text_font VARCHAR(255), text_color VARCHAR(255), font_size BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX project_id_idx (project_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE banner_position (id BIGINT AUTO_INCREMENT, banner_id BIGINT NOT NULL, position_index VARCHAR(22), x_position BIGINT, y_position BIGINT, INDEX banner_id_idx (banner_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE client_banner (id BIGINT AUTO_INCREMENT, banner_id BIGINT NOT NULL, client_text VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX banner_id_idx (banner_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, url VARCHAR(255), header VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE banner ADD CONSTRAINT banner_project_id_project_id FOREIGN KEY (project_id) REFERENCES project(id) ON DELETE CASCADE;
ALTER TABLE banner_position ADD CONSTRAINT banner_position_banner_id_project_id FOREIGN KEY (banner_id) REFERENCES project(id) ON DELETE CASCADE;
ALTER TABLE client_banner ADD CONSTRAINT client_banner_banner_id_banner_id FOREIGN KEY (banner_id) REFERENCES banner(id) ON DELETE CASCADE;

-- user_234201でログインする場合は、その前にrootでログインして権限を割り当てる必要がある
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'password';

-- user
CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) UNIQUE KEY NOT NULL,
    password LONGTEXT NOT NULL,
    email VARCHAR(255) UNIQUE KEY NOT NULL
);

-- しおり
CREATE TABLE bookmark (
    bookmark_id INT PRIMARY KEY AUTO_INCREMENT,
    bookmark_name VARCHAR(255) NOT NULL, -- しおり名
    bookmark_description VARCHAR(255) NOT NULL, -- 説明
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

-- しおり内のコンテンツ
CREATE TABLE bookmark_content (
    bookmark_content_id INT PRIMARY KEY AUTO_INCREMENT,
    bookmark_content_name VARCHAR(255) NOT NULL,
    bookmark_content_address VARCHAR(255) NOT NULL,
    bookmark_content_comment VARCHAR(255) NOT NULL,
    bookmark_content_price INT NOT NULL,
    bookmark_id INT NOT NULL,
    bookmark_instagram_url VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (bookmark_id) REFERENCES bookmark(bookmark_id)
);

-- しおり内コンテンツの画像
CREATE TABLE bookmark_content_image (
    bookmark_content_image_id INT PRIMARY KEY AUTO_INCREMENT,
    bookmark_content_image_data LONGBLOB NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    bookmark_content_id INT NOT NULL,
    FOREIGN KEY (bookmark_content_id) REFERENCES bookmark_content(bookmark_content_id)
);

-- -- 日記テーブル
-- CREATE TABLE diary (
--     diary_id INT PRIMARY KEY AUTO_INCREMENT,
--     diary_title VARCHAR(255) NOT NULL,
--     diary_content TEXT NOT NULL,
--     user_id INT NOT NULL,
--     created_at DATETIME DEFAULT NOW(),
--     FOREIGN KEY (user_id) REFERENCES user(user_id)
-- );

-- -- 日記画像テーブル
-- CREATE TABLE diary_image (
--     image_id INT PRIMARY KEY AUTO_INCREMENT,
--     diary_id INT NOT NULL,
--     diary_image_data LONGBLOB NOT NULL,
--     created_at DATETIME DEFAULT NOW(),
--     FOREIGN KEY (diary_id) REFERENCES diary(diary_id)
-- );


-- 初期データ（初回導入時はこれを実行してシステムにログインできるようにする）
INSERT INTO user (user_name, password, email)
VALUES ('JohnDoe', SHA2('password', 256), 'john-doe@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('JohnDoe2', SHA2('password', 256), 'john-doe2@example.com');
-- -- 蔵書のカテゴリ
-- CREATE TABLE book_category (
--     book_category_id INT PRIMARY KEY AUTO_INCREMENT,
--     book_category_name VARCHAR(255)
-- );

-- INSERT INTO book_category (book_category_name)
-- VALUES ('技術書'), ('ビジネス'), ('コミック'), ('小説');

-- -- 蔵書
-- CREATE TABLE books (
--     book_id INT PRIMARY KEY AUTO_INCREMENT,
--     book_name VARCHAR(255),
--     book_category INT,
--     regist_date TIMESTAMP,
--     regist_id INT,
--     FOREIGN KEY (book_category) REFERENCES book_category(book_category_id),
--     FOREIGN KEY (regist_id) REFERENCES user(user_id)
-- );

-- INSERT INTO books (book_name, book_category, regist_date, regist_id)
-- VALUES ('優しいJavaScript', 1, now(), 1), ('経営マスター', 2, now(), 1), ('Docker対全集', 1, now(), 1), ('DRAGON BALL', 3, now(), 1), ('神様のカルテ', 4, now(), 1);
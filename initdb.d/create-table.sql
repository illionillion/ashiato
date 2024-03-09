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
    -- bookmark_content_image_data LONGBLOB NOT NULL,    
    bookmark_content_image_path LONGTEXT NOT NULL,
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

-- しおりを追加
INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('Test Bookmark', 'This is a test bookmark', 1);

-- しおり内のコンテンツを追加
INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('Test Content', '123 Test St', 'This is a test content', 10, 1, 'https://www.instagram.com/test_content');

-- しおり内コンテンツの画像を追加
INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
VALUES ('/path/to/test_image.jpg', 1);

-- INSERT INTO bookmark(bookmark_id,bookmark_name,bookmark_description,user_id,created_at)
-- VALUES (1,"京都","酒蔵めぐり",1,NOW());

-- INSERT INTO bookmark_content(bookmark_content_id,bookmark_content_name,bookmark_content_address,bookmark_content_comment,bookmark_content_price,bookmark_id,bookmark_instagram_url,created_at)
-- VALUES (1,"伏見","住所","コメント","300","インスタ",NOW());

-- INSERT INTO bookmark_content_image(bookmark_image_id,bookmark_content_image_path,created_at,bookmark_content_id)
-- VALUES (1,"https://frieren-anime.jp/wp-content/themes/frieren_2023/assets/img/top/top/1_visual.jpg",NOW(),1);



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
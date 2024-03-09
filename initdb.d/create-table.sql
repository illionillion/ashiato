-- user_234201でログインする場合は、その前にrootでログインして権限を割り当てる必要がある
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
-- 文字化け表示のために必要
SET CHARACTER SET utf8mb4;

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

-- 初期データ（初回導入時はこれを実行してシステムにログインできるようにする）
INSERT INTO user (user_name, password, email)
VALUES ('JohnDoe', SHA2('password', 256), 'john-doe@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('JohnDoe2', SHA2('password', 256), 'john-doe2@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('wataru', SHA2('aaaa', 256), 'wataru@example.com');

-- しおりを追加
INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('Test Bookmark', 'This is a test bookmark', 1);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('Test Bookmark2', 'This is a test bookmark2', 1);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('Test Bookmark3', 'This is a test bookmark3', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('大阪旅行', '食べ歩き', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('京都', 'カフェ巡り', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('滋賀', '琵琶湖で釣り', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('東京スカイツリー', '東京スカイツリー', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('小樽海鮮', '小樽海鮮めぐり', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('沖縄', '沖縄美ら海水族館', 2);


-- しおり内のコンテンツを追加
INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('Test Content', '123 Test St', 'This is a test content', 10, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('Test Content2', '123 Test St2', 'This is a test content2', 10, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('大阪', '321 Test St2', '食べ歩き', 10, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('京都', ' 五条東', 'カフェ', 10, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('スカイツリー', ' 〒131-0045 東京都墨田区押上１丁目１−２', 'タワー', 162000, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('小樽', ' 〒047-0032 北海道小樽市稲穂３丁目１０−１６', '三角市場', 5990, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('博多旅行', ' 福岡県福岡市博多区築港本町１４－１', '博多ポートタワー', 3330, 1, 'https://www.instagram.com/test_content');

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url)
VALUES ('沖縄旅行', ' 〒905-0206 沖縄県国頭郡本部町石川４２４', '美ら海水族館', 19700, 1, 'https://www.instagram.com/test_content');

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
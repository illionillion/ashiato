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
    bookmark_content_image_path LONGTEXT NOT NULL,
    stay_time_h INT NOT NULL,
    stay_time_m INT NOT NULL,
    used_money INT NOT NULL,
    move_time_h INT NOT NULL,
    move_time_m INT NOT NULL,
    how_move VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (bookmark_id) REFERENCES bookmark(bookmark_id)
);

-- しおり内コンテンツの画像
-- CREATE TABLE bookmark_content_image (
--     bookmark_content_image_id INT PRIMARY KEY AUTO_INCREMENT,
--     bookmark_content_image_path LONGTEXT NOT NULL,
--     created_at DATETIME DEFAULT NOW(),
--     bookmark_content_id INT NOT NULL,
--     FOREIGN KEY (bookmark_content_id) REFERENCES bookmark_content(bookmark_content_id)
-- );

-- 初期データ（初回導入時はこれを実行してシステムにログインできるようにする）
INSERT INTO user (user_name, password, email)
VALUES ('JohnDoe', SHA2('password', 256), 'john-doe@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('JohnDoe2', SHA2('password', 256), 'john-doe2@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('wataru', SHA2('aaaa', 256), 'wataru@example.com');
INSERT INTO user (user_name, password, email)
VALUES ('LionelMessi', SHA2('11', 256), 'goot@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('gotumoritakesi', SHA2('gotumori', 256), 'takesi@example.com');

INSERT INTO user (user_name, password, email)
VALUES ('hetaredaimaou', SHA2('Yu1128145', 256), 'hanadekayu@icloud.com');

INSERT INTO user (user_name, password, email)
VALUES ('Luis Suárez ', SHA2('soccer', 256), 'soccerolayer@icloud.com');

-- しおりを追加
-- INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
-- VALUES ('Test Bookmark', 'This is a test bookmark', 1);

-- INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
-- VALUES ('Test Bookmark2', 'This is a test bookmark2', 1);

-- INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
-- VALUES ('Test Bookmark3', 'This is a test bookmark3', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('大阪旅行', '食べ歩き', 1);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('東京旅行', 'カフェ巡り', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('北海道旅行', '北国料理づくし', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('博多旅行', '美味しい料理', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('沖縄', '沖縄美ら海水族館', 2);
INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('日帰り愛知', '名所巡り', 6);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('みんなでドライブ', '免許持ってないけど！', 5);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('京都花見', '#京都 ＃観光', 7);

-- しおり内のコンテンツを追加
INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('難波', '大阪府難波', '商店街で食べ歩き', 10, 1, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('心斎橋', ' 大阪府大阪市', 'お洒落な居酒屋', 10, 1, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('道頓堀', ' 大阪府大阪市', '綺麗な橋', 10, 1, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('スカイツリー', '〒131-0045 東京都墨田区押上１丁目１−２', 'タワー', 162000, 2, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('小樽', '〒047-0032 北海道小樽市稲穂３丁目１０−１６', '三角市場', 5990, 3, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('博多旅行', '福岡県福岡市博多区築港本町１４－１', '博多ポートタワー', 3330, 4, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('沖縄旅行', '〒905-0206 沖縄県国頭郡本部町石川４２４', '美ら海水族館', 19700, 5, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('名古屋駅', '〒450-0002愛知県名古屋市中村区名駅1丁目1-4', '駅めっちゃきれい', 2500, 6, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 0, 30, 1000, 2, 30, "新快速で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('竹島', '〒450-0002愛知県名古屋市中村区名駅1丁目1-4', '夕日めちゃきれい', 1000, 6, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 30, 50, 1, 00, "名古屋駅から電車");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('淡路島までドライブ', '淡路島', 'ドライブたのしい', 2000, 7, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 0, 20, 0, 2, 00, "車");


INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('京都花見', '城南宮', '花綺麗', 1100, 7, 'https://www.instagram.com/test_content', '/img/Jonangu.jpg', 1, 30, 1100, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('京都花見', '庭園', '綺麗', 0, 7, 'https://www.instagram.com/test_content', '/img/Kyoto_Hanami_Garden.jpg', 0, 30, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('京都花見', '下鴨神社', '綺麗', 0, 7, 'https://www.instagram.com/test_content', '/img/Kyoto.jpg', 1, 00, 0, 0, 40, "電車");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('京都花見', '北野天満宮', '花が綺麗', 0, 7, 'https://www.instagram.com/test_content', '/img/Kyoto.jpg', 0, 30, 0, 0, 10, "徒歩");

-- しおり内コンテンツの画像を追加
-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 1);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 1);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 1);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 2);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 2);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 2);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 3);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 3);

-- INSERT INTO bookmark_content_image (bookmark_content_image_path, bookmark_content_id)
-- VALUES ('/image/sample1.jpg', 3);

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
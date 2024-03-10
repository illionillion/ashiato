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
VALUES ('四条', '食べ歩き', 1);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('カフェ', 'カフェ巡り', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('北海道旅行', '自然', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('博多旅行', '美味しい料理', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('沖縄', 'おしゃれ', 2);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('大阪', '名所巡り', 6);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('食べ歩き', 'food', 5);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('京都花見', '#京都 ＃観光', 7);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('大阪カメラ旅', '#大阪 ＃カメラ', 7);

INSERT INTO bookmark (bookmark_name, bookmark_description, user_id)
VALUES ('京都カメラ旅', '#京都 ＃カメラ', 7);

-- しおり内のコンテンツを追加
INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('四条', '京都府四条', '京都らしい', 10, 1, 'https://www.instagram.com/test_content', '/img/shizyo.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('京都駅前', ' 京都', 'まいこさん', 10, 1, 'https://www.instagram.com/test_content', '/img/maiko.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('祗園', ' 京都', '風情ある街並み', 10, 1, 'https://www.instagram.com/test_content', '/img/Gion.png', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('滋賀', ' 滋賀', 'カフェ', 10, 2, 'https://www.instagram.com/test_content', '/img/cafe.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('博多', '博多', 'カフェ', 10, 4, 'https://www.instagram.com/test_content', '/img/cafe.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('滋賀', '滋賀', 'カフェ2', 162000, 2, 'https://www.instagram.com/test_content', '/img/Hackathon Roz.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('もみじ公園', '庭', '紅葉が綺麗', 5990, 3, 'https://www.instagram.com/test_content', '/img/momizi.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('十勝', 'niwa', '田舎町の夕日', 3330,3, 'https://www.instagram.com/test_content', '/img/Good_photo.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('沖縄旅行', '〒905-0206 沖縄県国頭郡本部町石川４２４', '美ら海水族館', 19700, 5, 'https://www.instagram.com/test_content', '/img/osyare.jpg', 1, 20, 3000, 0, 20, "地下鉄で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('名古屋駅', '〒450-0002愛知県名古屋市中村区名駅1丁目1-4', 'トンネル', 2500, 5, 'https://www.instagram.com/test_content', '/img/tonel.jpg', 0, 30, 1000, 2, 30, "新快速で移動");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('愛知', '〒450-0002愛知県名古屋市中村区名駅1丁目1-4', '景色', 1000, 5, 'https://www.instagram.com/test_content', '/img/sample1.jpg', 1, 30, 50, 1, 00, "名古屋駅から電車");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('城南宮', '城南宮', '満開の桜', 1100, 8, 'https://www.instagram.com/test_content', '/img/Jonangu.jpg', 1, 30, 1100, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('北向山不動院', '庭園', '自然豊かでリラックスできる', 0, 8, 'https://www.instagram.com/test_content', '/img/Kyoto_Hanami_Garden.jpg', 0, 30, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('下鴨神社', '下鴨神社', 'ひな祭り', 0, 8, 'https://www.instagram.com/test_content', '/img/Kyoto_Han.png', 1, 00, 0, 0, 40, "電車");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('北野天満宮', '北野天満宮', 'あおぞらと梅', 0, 8, 'https://www.instagram.com/test_content', '/img/Kyoto.jpg', 0, 30, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('心斎橋', '心斎橋', '夜でも賑やかキャッチが多いので注意', 0, 9, 'https://www.instagram.com/test_content', '/img/Shinsaibashi.jpg', 0, 10, 0, 0, 0, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('心斎橋筋商店街', ' 心斎橋', '一本入るとそこには飲み屋が', 0, 9, 'https://www.instagram.com/test_content', '/img/Dotonbori.jpg', 2, 0, 3500, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('大阪', ' 北新地', '夜の街、綺麗', 0, 9, 'https://www.instagram.com/test_content', '/img/Kitashinch.jpg', 1, 0, 50000, 0, 15, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('京橋', '京橋', 'おねえちゃん綺麗', 0, 6, 'https://www.instagram.com/test_content', '/img/Kyobashi.jpg', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('たこ焼き', '道頓堀', '出来立て', 0, 7, 'https://www.instagram.com/test_content', '/img/Osaka_Takoyaki.jpg', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('食べ歩き', '道頓堀', '食い倒れ', 0, 7, 'https://www.instagram.com/test_content', '/img/Osaka_Food_Walk.jpg', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('道頓堀', '道頓堀', 'たこ焼き', 0, 6, 'https://www.instagram.com/test_content', '/img/Osaka_Food_Walk.jpg', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('宝ヶ池公園', '-', '国際会館', 0, 10, 'https://www.instagram.com/test_content', '/img/kokusaikaikan.png', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('鴨川', '-', 'はと寒そう', 0, 10, 'https://www.instagram.com/test_content', '/img/hato.png', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('嵐山', '-', '夜の紅葉', 0, 10, 'https://www.instagram.com/test_content', '/img/arashi.png', 30, 0, 0, 0, 10, "徒歩");

INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
stay_time_h,
stay_time_m,
used_money,
move_time_h,
move_time_m,
how_move
)
VALUES ('伏見稲荷', '-', 'パワースポット', 0, 10, 'https://www.instagram.com/test_content', '/img/hushimi.png', 30, 0, 0, 0, 10, "徒歩");

-- INSERT INTO bookmark_content (bookmark_content_name, bookmark_content_address, bookmark_content_comment, bookmark_content_price, bookmark_id, bookmark_instagram_url, bookmark_content_image_path,
-- stay_time_h,
-- stay_time_m,
-- used_money,
-- move_time_h,
-- move_time_m,
-- how_move
-- )
-- VALUES ('大阪', ' なんば', 'なんば', 0, 7, 'https://www.instagram.com/test_content', '/img/Osaka Food Walk.jpg', 30, 0, 0, 0, 10, "徒歩");







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
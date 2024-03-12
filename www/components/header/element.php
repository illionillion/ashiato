<header class="py-2 px-5">
    <div class="logo-icon">
        <a href="/"><img src="/img/ashiato.png" alt="ロゴアイコン"></a>
    </div>
    <div class="search-box d-flex justify-content-around align-items-center gap-2">
        <form action="/" class="d-flex">
            <input type="search" name="keyword" placeholder="Search" class="search form-control">
            <button class="search-btn btn btn-outline-success" type="search">
                <img src="/img/search.png" class="btn" alt="">
            </button>
        </form>
        <div class="user-control d-flex row justify-content-center align-items-center gap-1">
            <div class="user-name-display text-end"><?= htmlspecialchars($_SESSION["user_name"]); ?></div>
            <div class="text-end">
                <a href="/api/signout" class="btn btn-secondary">ログアウト</a>
            </div>
        </div>
    </div>
</header>
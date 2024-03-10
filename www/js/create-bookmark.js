window.addEventListener("load", () => {
  let placeCount = 0;
  let image = undefined;

  const changedFile = (e) => {
    if (e.target.files.length === 0) return;
    const preview = document.getElementById("preview");
    preview.innerHTML = "";

    const img = new Image();
    img.src = URL.createObjectURL(e.target.files[0]);

    img.classList.add("d-block", "w-100", "h-100", "object-fit-contain");

    preview.appendChild(img);
    image = img.src;
  };

  const addPlace = (e) => {
    e.preventDefault();
    // 値取得
    const place_name = document.getElementById("place-name").value;
    const place_address = document.getElementById("place-address").value;
    const place_comment = document.getElementById("place-comment").value;
    const expenses = document.getElementById("expenses").value;
    const stay_time_h = document.getElementById("stay-time-h").value;
    const stay_time_m = document.getElementById("stay-time-m").value;
    const used_money = document.getElementById("used-money").value;
    const move_time_h = document.getElementById("move-time-h").value;
    const move_time_m = document.getElementById("move-time-m").value;
    const how_move = document.getElementById("how-move").value;
    const image_file = document.getElementById("image-input").files;

    if (
      !place_name ||
      !place_address ||
      !place_comment ||
      !expenses ||
      !stay_time_h ||
      !stay_time_m ||
      !used_money ||
      !move_time_h ||
      !move_time_m ||
      !how_move ||
      !image_file.length
    ) {
      alert("未入力の項目があります。");
      return;
    }

    // HTMLにhiddenで追加
    const place_name_input = document.createElement("input");
    place_name_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("place-name").id
    }]`;
    place_name_input.type = "hidden";
    place_name_input.value = place_name;
    const place_address_input = document.createElement("input");
    place_address_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("place-address").id
    }]`;
    place_address_input.type = "hidden";
    place_address_input.value = place_address;
    const place_comment_input = document.createElement("input");
    place_comment_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("place-comment").id
    }]`;
    place_comment_input.type = "hidden";
    place_comment_input.value = place_comment;
    const expenses_input = document.createElement("input");
    expenses_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("expenses").id
    }]`;
    expenses_input.type = "hidden";
    expenses_input.value = expenses;
    //
    const stay_time_h_input = document.createElement("input");
    stay_time_h_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("stay-time-h").id
    }]`;
    stay_time_h_input.type = "hidden";
    stay_time_h_input.value = stay_time_h;
    //
    const stay_time_m_input = document.createElement("input");
    stay_time_m_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("stay-time-m").id
    }]`;
    stay_time_m_input.type = "hidden";
    stay_time_m_input.value = stay_time_m;
    //
    const used_money_input = document.createElement("input");
    used_money_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("used-money").id
    }]`;
    used_money_input.type = "hidden";
    used_money_input.value = used_money;
    //
    const move_time_h_input = document.createElement("input");
    move_time_h_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("move-time-h").id
    }]`;
    move_time_h_input.type = "hidden";
    move_time_h_input.value = move_time_h;
    //
    const move_time_m_input = document.createElement("input");
    move_time_m_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("move-time-m").id
    }]`;
    move_time_m_input.type = "hidden";
    move_time_m_input.value = move_time_m;
    //
    const how_move_input = document.createElement("input");
    how_move_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("how-move").id
    }]`;
    how_move_input.type = "hidden";
    how_move_input.value = how_move;
    //
    const image_input = document.createElement("input");
    image_input.name = `bookmark_content[${placeCount}][${
      document.getElementById("image-input").id
    }]`;
    image_input.type = "hidden";

    // base64
    const img = new Image();
    img.src = image;
    const canvas = document.createElement('canvas');
    canvas.width  = img.width;
    canvas.height = img.height;
    // Draw Image
    const ctx = canvas.getContext('2d');
    ctx.drawImage(img, 0, 0);
    // To Base64
    const base64 = canvas.toDataURL("image/jpeg");
    image_input.value = base64; // ここでbase64に変換したやつ入れる

    // placeにマウント
    document.getElementById("place").appendChild(place_name_input);
    document.getElementById("place").appendChild(place_address_input);
    document.getElementById("place").appendChild(place_comment_input);
    document.getElementById("place").appendChild(expenses_input);
    document.getElementById("place").appendChild(stay_time_h_input);
    document.getElementById("place").appendChild(stay_time_m_input);
    document.getElementById("place").appendChild(used_money_input);
    document.getElementById("place").appendChild(move_time_h_input);
    document.getElementById("place").appendChild(move_time_m_input);
    document.getElementById("place").appendChild(how_move_input);
    document.getElementById("place").appendChild(image_input);
    // 入力リセット
    document.getElementById("addPlaceModalForm").reset()
    document.querySelector("#addPlaceModal .btn-close").click();

    // アコーディオン追加
    const accordion = document.querySelector(".accordion");
    accordion.classList.remove("d-none");
    document.querySelector(".accordion-message").classList.add("d-none");
    // スライダーのテンプレートのタグを取得
    const template = document.getElementById("accordion-item-template");
    // 複製
    const clone = template.content.cloneNode(true);
    // previewにスライダーを挿入
    accordion.appendChild(clone);
    
    img.classList.add("d-block", "w-100", "h-100", "object-fit-contain");
    const slider = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .carousel-inner`
    );
    slider.appendChild(img);

    // id変更
    const accordionCollapse = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-collapse`
    );
    accordionCollapse.id = `panelsStayOpen-${placeCount + 1}`;
    // タイトル変更
    const title = document.querySelector(
      `.accordion-item:nth-child(${
        placeCount + 1
      }) .accordion-header .accordion-button`
    );
    title.textContent = place_name;
    title.dataset.bsTarget = `#panelsStayOpen-${placeCount + 1}`;
    title.setAttribute("aria-controls", `panelsStayOpen-${placeCount + 1}`);
    // 住所変更
    const address = document.querySelector(
      `.accordion-item:nth-child(${
        placeCount + 1
      }) .accordion-body .address-text`
    );
    address.textContent = place_address;
    // コメント変更
    const comment = document.querySelector(
      `.accordion-item:nth-child(${
        placeCount + 1
      }) .accordion-body .comment-text`
    );
    comment.textContent = place_comment;
    // 価格変更
    const price = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .price-text`
    );
    price.textContent = `${expenses}円`;
    // 過ごした時間変更
    const stay_time = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .stay-time-text`
    );
    stay_time.textContent = `${stay_time_h}時間${stay_time_m}分`;
    // 移動時間変更
    const move_time = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .move-time-text`
    );
    move_time.textContent = `${move_time_h}時間${move_time_m}分`;
    // 使ったお金変更
    const used_price = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .used-price-text`
    );
    used_price.textContent = `${used_money}円`;
    // 使ったお金変更
    const how_move_text = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .how-move-text`
    );
    how_move_text.textContent = `${how_move}円`;
    const preview = document.getElementById("preview");
    preview.innerHTML = "";
    image = undefined;
    placeCount++;
  };

  document
    .getElementById("image-input")
    .addEventListener("change", changedFile);
  document.getElementById("placeAddBtn").addEventListener("click", addPlace);
  document.getElementById("addPlaceModalForm").addEventListener("submit", addPlace);
});

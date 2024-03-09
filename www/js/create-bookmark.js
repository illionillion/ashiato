let image = undefined;

const changedFile = e => {
  if (e.target.files.length === 0) return;
  const preview = document.getElementById("preview");
  preview.innerHTML = "";

  const img = new Image()
  img.src = URL.createObjectURL(e.target.files[0])

  img.classList.add(
    "d-block",
    "w-100",
    "h-100",
    "object-fit-contain"
  );

  preview.appendChild(img);
  image = img.src

  // const template = document.getElementById("slider-template");
  // const clone = template.content.cloneNode(true);
  // preview.appendChild(clone);
  // const slider = document.querySelector("#preview .carousel-inner");
  // Object.values(e.target.files).forEach((file, index) => {
  //   const imageObj = new Image();
  //   imageObj.src = URL.createObjectURL(file);
  //   console.log(imageObj);
  //   images.push(imageObj)
  //   const slide = document.createElement("div");
  //   slide.classList.add("carousel-item", "h-100", index === 0 && "active");
  //   imageObj.classList.add(
  //     "d-block",
  //     "img-thumbnail",
  //     "w-100",
  //     "h-100",
  //     "object-fit-contain"
  //   );
  //   slide.appendChild(imageObj);
  //   slider.appendChild(slide);
  // });
}

window.addEventListener("load", () => {
  let placeCount = 0;

  document.getElementById("image-input").addEventListener("change", changedFile);
  document.querySelector("#placeAddBtn").addEventListener("click", () => {
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

    if (!place_name
      || !place_address
      || !place_comment
      || !expenses
      || !stay_time_h
      || !stay_time_m
      || !used_money
      || !move_time_h
      || !move_time_m
      || !how_move
      || !image_file.length
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
    image_input.type = "file";
    image_input.classList.add("d-none")
    image_input.files = image_file;
    // const clone_image_input = document.getElementById('image-input').cloneNode(true);
    // clone_image_input.name = `bookmark_content[${placeCount}][${
    //   document.getElementById("image-input").id
    // }]`
    console.log(image_input.files);

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

    document.getElementById("place-name").value = "";
    document.getElementById("place-address").value = "";
    document.getElementById("place-comment").value = "";
    document.getElementById("expenses").value = "";

    document.getElementById("stay-time-h").value = "";
    document.getElementById("stay-time-m").value = "";
    document.getElementById("used-money").value = "";
    document.getElementById("move-time-h").value = "";
    document.getElementById("move-time-m").value = "";
    document.getElementById("how-move").value = "";
    // document.getElementById("image-input").reset() = "";
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
    const img = new Image()
    img.src = image
    img.classList.add(
      "d-block",
      "w-100",
      "h-100",
      "object-fit-contain"
    );
    const slider = document.querySelector(`.accordion-item:nth-child(${placeCount + 1}) .carousel-inner`);
    slider.appendChild(img)
    // スライダーの中のスライドを入れる部分を取得
    // const slider = document.querySelector("#preview .carousel-inner");
    // const slider = document.querySelector(`.accordion-item:nth-child(${placeCount + 1}) .carousel-inner`);
    // ファイルをループを回して取り出してスライダーに挿入
    // Object.values(images).forEach((image, index) => {
      
    //   //   div作成
    //   const slide = document.createElement("div");
    //   //   クラス追加
    //   slide.classList.add(
    //     "carousel-item",
    //     "h-100",
    //     index === 0 && "active" // 最初の画像のみ「active」クラスをつける
    //   );
    //   // imageObj.classList.add(
    //   //   "d-block",
    //   //   "img-thumbnail",
    //   //   "w-100",
    //   //   "h-100",
    //   //   "object-fit-contain"
    //   // );
    //   //   スライドに画像マウント
    //   slide.appendChild(image);
    //   //   スライダーにスライドマウント
    //   slider.appendChild(slide);
    // });
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
    // コメント変更
    const price = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .price-text`
    );
    price.textContent = `${expenses}円`;
    // カルーセル
    const carousel = document.querySelector(
      `.accordion-item:nth-child(${placeCount + 1}) .accordion-body .carousel`
    );
    carousel.id = `carousel-${placeCount + 1}`;
    const carouselPrev = document.querySelector(
      `.accordion-item:nth-child(${
        placeCount + 1
      }) .accordion-body .carousel .carousel-control-prev`
    );
    carouselPrev.dataset.bsTarget = `#carousel-${placeCount + 1}`;
    const carouselNext = document.querySelector(
      `.accordion-item:nth-child(${
        placeCount + 1
      }) .accordion-body .carousel .carousel-control-next`
    );
    carouselNext.dataset.bsTarget = `#carousel-${placeCount + 1}`;

    const preview = document.getElementById("preview");
    preview.innerHTML = "";
    image = undefined;
    placeCount++;
  });
});

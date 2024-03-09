window.addEventListener("load", () => {
  let placeCount = 0;
  document.querySelector("#placeAddBtn").addEventListener("click", () => {
    // 値取得
    const place_name = document.getElementById("place-name").value;
    const place_address = document.getElementById("place-address").value;
    const place_comment = document.getElementById("place-comment").value;
    const expenses = document.getElementById("expenses").value;

    if (!place_name || !place_address || !place_comment || !expenses) {
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

    document.getElementById("place").appendChild(place_name_input);
    document.getElementById("place").appendChild(place_address_input);
    document.getElementById("place").appendChild(place_comment_input);
    document.getElementById("place").appendChild(expenses_input);

    document.getElementById("place-name").value = "";
    document.getElementById("place-address").value = "";
    document.getElementById("place-comment").value = "";
    document.getElementById("expenses").value = "";
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

    placeCount++;
  });
});

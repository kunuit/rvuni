const arrUni = [
  {
    quantity: 3,
    IDUni: "QSA",
    name: "Trường đại học Bách Khoa TPHCM",
    address: "nhà mình",
    star: 8,
  },
  {
    quantity: 2,
    IDUni: "QSC",
    name: "Trường đại học CNTT TPHCM",
    address: "nhà mình",
    star: 8,
  },
  {
    quantity: 3,
    IDUni: "QSK",
    name: "Trường đại học Kinh tế-Luật",
    address: "nhà mình",
    star: 20,
  },
];

arrUni.forEach((e) => {
  console.log(e)
  $(".ListUni").append(`
<tr>
  <td class="w-10">
    <button type="button" rel="tooltip" title="Read Task"
      class="btn btn-primary btn-link btn-sm" onClick="readUni('${e.name}','${e.IDUni}')">
      <i class="material-icons">search</i>
    </button>
  </td>
  <td class="w-10">
    ${e.IDUni}
  </td>
  <td class="w-10">
    ${e.name}
  </td>
  <td class="w-20">
    ${e.address}
  </td>
  <td class="w-30">
    ${Math.round(e.star / e.quantity)}
  </td>
  <td class="w-10">
    ${e.quantity}
  </td>
  <td class="td-actions text-left" class="w-10">
     <button type="button" rel="tooltip" title="Edit Task"
       class="btn btn-primary btn-link btn-sm">
       <i class="material-icons">edit</i>
     </button>
     <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
       <i class="material-icons">close</i>
     </button>
  </td>
</tr>
  `);
});

const QSA = [
  {
    name: "Huấn Rose",
    position: "đại ca",
    review: "rớt môn là món ăn tinh thần",
    star: 2,
    like: 34,
    dislike: 50,
    delete: 4
  },
  {
    name: "Đường Dương",
    position: "tù nhân",
    review: "nhiều lính tớ lắm",
    star: 2,
    like: 30,
    dislike: 20,
    delete: 11
  },
  {
    name: "Long Đen",
    position: "Tém Tôm",
    review: "Qua môn là dễ",
    star: 4,
    like: 10,
    dislike: 0,
    delete: 1
  },
];

const QSC = [
  {
    name: "Hiếu Lợn",
    position: "dev 20k$",
    review: "trường IT mà học ....",
    star: 2,
    like: 10,
    dislike: 0,
    delete: 1
  },
  {
    name: "kun",
    position: "sv nor",
    review: "qua môn là hạnh phúc",
    star: 5,
    like: 40,
    dislike: 0,
    delete: 2
  },
  {
    name: "Long Đen",
    position: "Tém Tôm",
    review: "Qua môn là dễ",
    star: 4,
    like: 0,
    dislike: 20,
    delete: 10
  },
];

function readUni(name,IDUni) {
  $('.IDUniHeader').empty().append(`<a class="headerUniRV" href="#">${name}</a>`)
  if(IDUni == 'QSC'){
    $('.listRV > tr').remove()
    QSC.forEach(e => {
      $('.listRV').append(`
      <tr>
        <td class="w-10">
          ${e.name}
        </td>
        <td class="w-10">
          ${e.position}
        </td>
        <td class="w-20">
          ${e.review}
        </td>
        <td class="w-10">
          ${e.star}
        </td>
        <td class="w-10">
          ${e.like}
        </td>
        <td class="w-10">
          ${e.dislike}
        </td>
        <td class="w-10">
          ${e.delete}
        </td>
        <td class="td-actions text-left" class="w-10">
          <button type="button" rel="tooltip" title="Edit Task"
            class="btn btn-primary btn-link btn-sm">
            <i class="material-icons">edit</i>
          </button>
          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
            <i class="material-icons">close</i>
          </button>
        </td>
      </tr>
      `)
    })
  }
  else if(IDUni == 'QSA') {
    $('.listRV > tr').remove()
    QSA.forEach(e => {
      $('.listRV').append(`
      <tr>
        <td class="w-10">
          ${e.name}
        </td>
        <td class="w-10">
          ${e.position}
        </td>
        <td class="w-20">
          ${e.review}
        </td>
        <td class="w-10">
          ${e.star}
        </td>
        <td class="w-10">
          ${e.like}
        </td>
        <td class="w-10">
          ${e.dislike}
        </td>
        <td class="w-10">
          ${e.delete}
        </td>
        <td class="td-actions text-left" class="w-10">
          <button type="button" rel="tooltip" title="Edit Task"
            class="btn btn-primary btn-link btn-sm">
            <i class="material-icons">edit</i>
          </button>
          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
            <i class="material-icons">close</i>
          </button>
        </td>
      </tr>
      `)
    })
  }
};

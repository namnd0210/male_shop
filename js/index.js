import data from "./data.js";

let list_order = data;

// const cancelOrder = (index) => {
//   list_order = [
//     ...list_order.splice(0, index),
//     ...list_order.splice(index + 1),
//   ];
//   renderListOrder();
// };

const renderListOrder = () => {
  document.querySelector(".list__order--list-info").innerHTML = list_order.map(
    (order, index) =>
      `<div class="shop-info row">
        <p class="shop-name">${order.shop_name}</p>
        <p class="time">${order.time}</p>
        <p class="status">${order.status}</p>
      </div>

      ${order.list_item.map(
        (item) =>
          `<div class="list__order--list-item">
            <div class="item row">
              <div class="image pr-3">
                <a href=""><img src="${item.image}" alt="" /></a>
              </div>
                <div class="information">
                <div class="information--name">${item.name}</div>
                <div class="category">${item.type}</div>
                <div class="amount">x ${item.amount}</div>
              </div>
              <div class="price">
                <div class="price--origin">$${item.o_price}</div>
                <div class="price--sale">$${item.s_price}</div>
              </div>
            </div>
          </div>`
      )}
      
      <div class="list__order--footer mb-2">
        <button
          class="btn btn-danger cancel-order"
          data-toggle="modal"
          data-target="#exampleModal"
        >
          Hủy đơn hàng
        </button>
        <button type="button" class="btn btn-info">Đánh giá</button>
        <button type="button" class="btn btn-light">
          <a href="order-details.html">Xem chi tiết đơn hàng</a>
        </button>
        <div class="cash"><i class="fa fa-money"></i></div>
        <div class="total">Tổng số tiền: $450</div>
      </div> 
      `
  );
};

const openModal = () => {
  document.getElementById("modal-cancel").innerHTML = `
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Modal title
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Bạn có chắc chắn muốn hủy đơn hàng không?
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
            style="width: 150px;"
          >
            Hủy
          </button>
          <button type="button" class="btn btn-primary" style="width: 150px;">
            Xác nhận
          </button>
        </div>
      </div>
    </div>
  </div>`;
};

const render = () => {
  renderListOrder();
  openModal();
};

render();

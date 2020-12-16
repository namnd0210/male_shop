import data from "./data.js";

let list_order = data;

const renderListOrder = () => {
  document.querySelector(".list__order--list-info").innerHTML = list_order.map(
    (order, index) =>
      `<div class="shop-info row">
        <p class="shop-name" style="color: red; border: 1px solid red; padding: 0.25rem 0.5rem; border-radius: 0.5rem;">${
          order.shop_name
        }</p>
        <div class="d-flex justify-content-end">
          <p class="time mr-5" style="align-items: center; display: flex;">${
            order.time
          }</p>
          <p class="status" style="border: 1px solid #59bd1d; padding: 0.25rem 0.5rem; border-radius: 0.5rem;">${
            order.status
          }</p>
        </div>
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
          <a href="order-details.php">Xem chi tiết đơn hàng</a>
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

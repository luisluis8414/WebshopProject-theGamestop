$(document).ready(function() {
    $.ajax({
      url: 'php/getOrder.php',
      type: 'GET',
      dataType: 'json',
      success: function(response) {

        for (let i = 0; i < response.length; i++) {

          let id = response[i].id;
          let totalSum = response[i].totalSum;
          
          let listItem = `
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
              <p class="mb-0 id">OrderId: <b>${id}</b></p>
              <p class="mb-0 totalSum">Sum: <b>${totalSum}$</b></p>
              <button type="button"  class="btn btn-outline-primary ms-1 mt-2" id="viewOrder${id}" onclick="onClickOrder(${id})">View Order</button>
            </li>
          `;
          
          $('#orders').append(listItem);
        }
      },
      error: function(xhr, status, error) {
        console.log('Error:', error);
      }
    });
  });
  
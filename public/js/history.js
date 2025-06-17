const orderList = document.getElementById('order-history-list');
const loading = document.getElementById('history-loading');
const emptyMsg = document.getElementById('history-empty');

// Hardcoded Order Data
const orders = [
  {
    id: 'ORD123456',
    date: '2025-06-18T14:30:00Z',
    total: 127,
    status: 'completed'
  },
];

function renderOrders(data) {
  loading.style.display = 'none';

  if (data.length === 0) {
    emptyMsg.classList.remove('hidden');
    return;
  }

  data.forEach(order => {
    const orderEl = document.createElement('div');
    orderEl.className = 'order-item';

    orderEl.innerHTML = `
      <div class="order-info">
        <p><strong>Order ID:</strong> ${order.id}</p>
        <p><strong>Date:</strong> ${new Date(order.date).toLocaleDateString()}</p>
        <p><strong>Total:</strong> Rp${order.total.toLocaleString('id-ID')}</p>
        <p class="status"><strong>Status:</strong> ${order.status}</p>
      </div>
    `;

    orderList.appendChild(orderEl);
  });
}

function viewOrderDetail(orderId) {
  alert(`Detail for Order ID: ${orderId} (mocked)`);
}

document.addEventListener('DOMContentLoaded', () => {
  renderOrders(orders);
});

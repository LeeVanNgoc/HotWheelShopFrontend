// Hàm gửi yêu cầu POST đến backend
function sendRequest(action, data, callback) {
  // Tạo một đối tượng XMLHttpRequest
  const xhr = new XMLHttpRequest();

  // Định nghĩa phương thức và URL để gửi yêu cầu tới backend
  xhr.open("POST", action, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Xử lý khi backend trả lời
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      // Gọi callback nếu yêu cầu thành công
      callback(xhr.responseText);
    } else {
      console.error("Request failed with status: " + xhr.status);
    }
  };

  // Xử lý lỗi khi có lỗi xảy ra
  xhr.onerror = function () {
    console.error("Request failed");
  };

  // Chuyển đổi đối tượng data thành chuỗi query string
  const params = new URLSearchParams(data).toString();

  // Gửi yêu cầu
  xhr.send(params);
}
